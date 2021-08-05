Vue.component('offer-show', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/offer/${this.resourceId || ''}`,
            form: new SparkForm({
                name: '',
                description: '',
                legal_display_copy: '',
                external_offer_id: '',
                start_date: '',
                end_date: '',
                department_id: '',
                owner_id: '',
                deleted_at: '',
                restore_banners: false,
            }),
        };
    },

    ready() {
        if (!this.resourceId) {
            this.initDateTimePickers();
        }
    },

    methods: {

        initDateTimePickers() {
            let settings = {
                format: 'MM/DD/YYYY', //Uncomment for time picker: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false, //Important! https://github.com/Eonasdan/bootstrap-datetimepicker/issues/1075
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
                minDate: false, // default
                maxDate: false, // default
            };

            let startSettings = $.extend({}, settings);
            let endSettings = $.extend({}, settings);

            if (window.Vacoda.active_date_precedence && window.Vacoda.active_date_precedence === "banner") {
                if (this.resource && this.resource.banners.length > 0) {
                    // get start dates of associated banners
                    let startDates = this.resource.banners.map(function(banner){
                        return moment(banner.start_date, 'MM/DD/YYYY');
                    });

                    // set start date picker's maximum to the earliest banner start date
                    startSettings.maxDate = moment.min(startDates);

                    // get end dates of associated banners
                    let endDates = this.resource.banners.map(function(banner){
                        return moment(banner.end_date, 'MM/DD/YYYY');
                    });

                    // set end date picker's minimum to the latest banner start date
                    endSettings.minDate = moment.max(endDates);
                }
            }

            $('#datetimepicker3').datetimepicker(startSettings);
            $('#datetimepicker4').datetimepicker(endSettings);
        },

        /**
         * Called after the resource is retrieved.
         */
        getResourceSuccess() {
            console.log('offer getResourceSuccess');

            console.log('this.resource');
            console.log(this.resource);

            this.form.name = this.resource.name;
            this.form.description = this.resource.description;
            this.form.legal_display_copy = this.resource.legal_display_copy ? this.resource.legal_display_copy : '';
            this.form.external_offer_id = this.resource.external_offer_id ? this.resource.external_offer_id : '';
            this.form.start_date = this.resource.start_date ? this.resource.start_date : '';
            this.form.end_date = this.resource.end_date ? this.resource.end_date : '';
            this.form.department_id = this.resource.department_id ? this.resource.department_id : '';
            this.form.owner_id = this.resource.owner_id ? this.resource.owner_id : '';
            this.form.deleted_at = this.resource.deleted_at ? this.resource.deleted_at : '';

            this.initDateTimePickers();

            setTimeout(function(){
                $('.resource-select').change();
            }, 0);
        },

        /**
         * Called after the resource is created.
         */
        createSuccess(response) {
            console.log('response');
            console.log(response);
            
            if (response && response.created === 'true') {
                swal({
                    title: "Success!",
                    text: "Offer successfully created. Great job! Create another?",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function() {
                    window.location = '/offer/';
                });

            } else {
                swal({
                    title: "Error.",
                    text: "There was an error. The offer was not created.",
                    type: "error",
                    confirmButtonText: "Ok",
                    customClass: "sweetError"
                });
            }
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess(response) {
            if (response && response.updated === 'true') {
                swal({
                    title: "Success!",
                    text: "Offer successfully updated.",
                    type: "success",
                    confirmButtonText: "Ok",
                    customClass: "sweet-error"
                });
            } else {
                this.handleErrors(response);
            }

        },

        /**
         * Called after the resource is deleted.
         */
        deleteSuccess(response) {
            console.log('response');
            console.log(response);

            if (response && response.destroyed == 'true') {
                swal({
                    title: "Success!",
                    text: "Offer successfully archived.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function(){
                    window.location = window.location.origin+'/offers';
                });
            } else {
                this.handleErrors(response);
                return false;
            }
        },

        /**
         * Approve the restoration of the given archived resource.
         * override from api-resource
         */
        approveRestore() {
            let vue = this;

            swal({
                title: "Are you sure?",
                text: "Would you like to restore all of the banners associated with this offer?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, restore related banners",
                cancelButtonText: "No, only restore this offer",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        //vue.form.restore_banners = true;
                        vue.restore(true)
                    } else {
                        vue.restore()
                    }
                });
        },

        /**
         * Restore the given resource.
         */
        restore(restore_banners=false, form = this.form, callback = this.restoreSuccess) {
            if (restore_banners) {
                this.form.restore_banners = true;
            }
            Spark.put(this.resourceUri + '/restore', form)
                .then(response => {
                    console.log('response');
                    console.log(response);
                    callback(response);
                })
                .catch(errors => {
                    this.handleErrors(errors);
                    reject(errors.data);
                });
        },

        copy() {
            this.resourceId = null;
            this.resourceUri = '/api/offer/';
            this.form.name = `[COPY] ${this.form.name}`;
            window.history.pushState("", "", '/offer/');
            window.scrollTo(0, 0);
        }
    }
});


