Vue.component('option-show', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/option/${this.resourceId || ''}`,
            form: new SparkForm({
                option_type_id: '',
                name: '',
                abbreviation: '',
            })
        };
    },

    methods: {
        /**
         * Called after the resource is retrieved.
         */
        getResourceSuccess() {
            this.form.option_type_id = this.resource.option_type_id;
            this.form.name = this.resource.name;
            this.form.abbreviation = this.resource.abbreviation;
        },

        /**
         * Called after the resource is created.
         */
        createSuccess(response) {
            if (response && response.created === 'true') {
                swal({
                    title: "Success!",
                    text: "Option successfully created.",
                    type: "success",
                    confirmButtonText: "Ok"
                });

                this.form.option_type_id = '';
                this.form.name = '';
                this.form.abbreviation = '';

            } else {
                this.handleErrors(response);
            }
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess(response) {
            if (response && response.updated === 'true') {
                swal({
                    title: "Success!",
                    text: "Option successfully updated.",
                    type: "success",
                    confirmButtonText: "Ok"
                });
            } else {
                this.handleErrors(response);
            }
        },

        /**
         * Called after the resource is deleted.
         */
        deleteSuccess(response) {
            if (response && response.destroyed == 'true') {
                swal({
                    title: "Success!",
                    text: "Option successfully archived.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function(){
                    window.location = window.location.origin + '/options';
                });
            } else {
                this.handleErrors(response);

                return false;
            }
        }
    }
});
