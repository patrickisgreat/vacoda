Vue.component('option-type-show', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/option-type/${this.resourceId || ''}`,
            form: new SparkForm({
                name: '',
            })
        };
    },

    methods: {
        /**
         * Called after the resource is retrieved.
         */
        getResourceSuccess() {
            this.form.name = this.resource.name;
        },

        /**
         * Called after the resource is created.
         */
        createSuccess(response) {
            if (response && response.created === 'true') {
                swal({
                    title: "Success!",
                    text: "Option type successfully created.",
                    type: "success",
                    confirmButtonText: "Ok"
                });

                this.form.name = '';

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
                    text: "Option type successfully updated.",
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
                    text: "Option type successfully archived.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function(){
                    window.location = window.location.origin + '/option-types';
                });
            } else {
                this.handleErrors(response);

                return false;
            }
        }
    }
});
