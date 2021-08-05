Vue.component('report-show', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/report/`,
            form: new SparkForm({
                banner_ids: [],
                category_ids: [],
                type: 'summary',
                start_date: '',
                end_date: '',
                trend_interval: '',
                data_points: [],
            }),
            selectedBanners: [],
        };
    },

    computed: {
        categoryLimit() {
            if (this.selectedBanners.length > 0) {
                return _.uniq(_.flatten(_.pluck(this.selectedBanners, 'categories')));
            }

            return [];
        },
    },

    created() {
        //
    },

    ready() {
        this.initDateTimePickers();
    },

    methods: {
        /**
         * Submit the form.
         */
        submit() {
            Spark.post(this.resourceUri, this.form)
                .then(response => {
                    this.submitSuccess(response);
                })
                .catch(errors => {
                    console.log(errors);
                    this.handleErrors(errors);
                    reject(errors.data);
                });
        },

        /**
         * Called after the form is submitted successfully.
         */
        submitSuccess(response) {
            if (_.isEmpty(response)) {
                this.handleErrors();
                return;
            }

            let ReportResults = Vue.extend(require('./results'));

            let resultsTable = new ReportResults({
                el() {
                    return '#report-results';
                },

                propsData: {
                    reportData: response,
                }
            });

            // add modal close button into datatables button container
            $('<button id="report-results-modal-close" type="button" class="dt-button buttons-html5" data-dismiss="modal">Close</button>')
                .prependTo('#report-results-modal .dt-buttons');

            // add title to modal based on type & fields
            let reportModalTitle = this.form.type.charAt(0).toUpperCase() + this.form.type.slice(1), // capitalize
                reportModalSubtitle = `${this.form.start_date} - ${this.form.end_date}`;

            if (this.form.type === 'trending') {
                let interval = this.form.trend_interval.charAt(0).toUpperCase() + this.form.trend_interval.slice(1); // capitalize
                reportModalTitle += ` (${interval})`;
            }

            $('#report-results-modal .modal-title').text(reportModalTitle);
            $('#report-results-modal .modal-subtitle').text(reportModalSubtitle);

            // create & show the modal
            $('#report-results-modal').modal();

            // destroy results table on modal close
            $('#report-results-modal').on('hidden.bs.modal', () => {
                // destroy datatables instance
                //$('#report-results table').dataTable().api().destroy();

                // destroy vue instance
                resultsTable.$destroy();
            });
        },

        /**
         * Reset the form.
         */
        reset() {
            this.form.banner_ids = [];
            this.form.category_ids = [];
            $('input[type=search]').val('').change();
            this.form.type = '';
            this.form.start_date = '';
            this.form.end_date = '';
            this.form.trend_interval = '';
            this.form.data_points = [];
            window.scrollTo(0, 0);
        },

        initDateTimePickers() {
            // TODO: globalize some of these settings
            let icons = {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            };

            $('#report-start').datetimepicker({
                format: 'MM/DD/YYYY', //Uncomment for time picker: 'YYYY-MM-DD HH:mm:ss',
                icons: icons
            });

            $('#report-end').datetimepicker({
                format: 'MM/DD/YYYY', //Uncomment for time picker: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false, //Important! https://github.com/Eonasdan/bootstrap-datetimepicker/issues/1075
                icons: icons
            });

            $("#report-start").on("dp.change", function (e) {
                $('#report-end').data("DateTimePicker").minDate(e.date);
            });

            $("#report-end").on("dp.change", function (e) {
                $('#report-start').data("DateTimePicker").maxDate(e.date);
            });
        },

        handleErrors(errors = {}) {
            if (errors.status == 422) {
                swal({
                    title: "Error.",
                    text: "We still need a little more information. Please complete the indicated fields.",
                    type: "error",
                    confirmButtonText: "Ok"
                });
                return;
            }

            if (errors.data == "Forbidden") {
                swal({
                    title: "Error.",
                    text: "You do not have permission to perform this action.",
                    type: "error",
                    confirmButtonText: "Ok"
                });

                return;

            }

            swal({
                title: "Error.",
                text: "Your report has returned zero results. Please update the search criteria and try again",
                type: "error",
                confirmButtonText: "Ok",
                customClass: "sweet-error"
            });

            return;
        }
    }
});
