Vue.component('layout-show', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */

    data() {
        return {
            resourceUri: `/api/layout/${this.resourceId || ''}`,
            form: new SparkForm({
                name: '',
                description: '',
                html: '',
                css: '',
            })
        };
    },

    methods: {
        /**
         * Called after the resource is retrieved.
         */
        getResourceSuccess() {
            this.form.name = this.resource.name;
            this.form.description = this.resource.description;
            this.form.html = this.resource.html;
            this.form.css = this.resource.css;
        },

        /**
         * Called after the resource is created.
         */
        createSuccess(response) {
            if (response && response.created === 'true') {

                swal({
                    title: "Success!",
                    text: "Layout successfully created.",
                    type: "success",
                    confirmButtonText: "Ok"
                });
            } else {
                this.handleErrors(response);
            }

            this.form.name = '';
            this.form.description = '';
            this.form.html = '';
            this.form.css = '';
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess(response) {
            if (response && response.updated === 'true') {
                swal({
                    title: "Success!",
                    text: "Layout successfully updated.",
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
        deleteSuccess() {
            //
        },
    }
});
