Vue.component('theme-show', {
    mixins: [require('../api-resource')],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/theme/${this.resourceId || ''}`,
            form: new SparkForm({
                name: '',
                description: '',
                font_color: '',
                font_color_secondary: '',
                cta_font_color: '',
                cta_bg_color: '',
                background_color: '',
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
            this.form.font_color = this.resource.font_color;
            this.form.font_color_secondary = this.resource.font_color_secondary;
            this.form.cta_font_color = this.resource.cta_font_color;
            this.form.cta_bg_color = this.resource.cta_bg_color;
            this.form.background_color = this.resource.background_color;
        },

        /**
         * Called after the resource is created.
         */
        createSuccess(response) {
            if (response && response.created === 'true') {
                swal({
                    title: "Success!",
                    text: "Theme successfully created.",
                    type: "success",
                    confirmButtonText: "Ok"
                });

                this.form.name = '';
                this.form.description = '';
                this.form.font_color = '';
                this.form.font_color_secondary = '';
                this.form.cta_font_color = '';
                this.form.cta_bg_color = '';
                this.form.background_color = '';

            } else {
                this.handleErrors(response)
            }
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess(response) {
            if (response && response.updated === 'true') {
                swal({
                    title: "Success!",
                    text: "Theme successfully updated.",
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
                    text: "Theme successfully archived.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function(){
                    window.location = window.location.origin + '/themes';
                });
            } else {
                this.handleErrors(response);

                return false;
            }
        }
    }
});
