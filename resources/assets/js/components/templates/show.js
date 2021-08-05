Vue.component('template-show', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/template/${this.resourceId || ''}`,
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
                    text: "Template successfully created.",
                    type: "success",
                    confirmButtonText: "Ok"
                });

                this.form.name = '';
                this.form.description = '';
                this.form.html = '';
                this.form.css = '';

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
                    text: "Template successfully updated.",
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
                    text: "Template successfully archived.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function(){
                    window.location = window.location.origin + '/templates';
                });
            } else {
                this.handleErrors(response);

                return false;
            }
        }
    }
});
