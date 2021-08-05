Vue.component('vacoda-settings', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/settings/`,
            form: new SparkForm({
                active_date_precedence: '',
            })
        };
    },

    /**
     * Prepare the component.
     */
    created() {
        this.getResource();
    },

    methods: {
        /**
         * Called after the resource is retrieved.
         */
        getResourceSuccess() {
            this.form.active_date_precedence = this.resource.active_date_precedence;
        },

        /**
         * Save changes with an update
         */
        save() {
            this.update();
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess(response) {
            if (response && response.updated === 'true') {
                swal({
                    title: "Success!",
                    text: "Settings successfully updated.",
                    type: "success",
                    confirmButtonText: "Ok"
                });
            } else {
                this.handleErrors(response);
            }
        },
    }
});
