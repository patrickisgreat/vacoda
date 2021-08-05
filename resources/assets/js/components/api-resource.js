module.exports = {
    props: ['user', 'team', 'resourceId'],

    /**
     * Prepare the component.
     */
    created() {
        if (this.resourceId || this.list) {
            this.getResource();
        }
    },

    methods: {
        /**
         * Get the resource being managed.
         */
        getResource() {
            if (this.resourceUri !== null) {
                this.$http.get(this.resourceUri)
                    .then(response => {
                        console.log('response');
                        console.log(response);
                        this.resource = response.data;
                        this.getResourceSuccess(response.data);
                    });
            }
        },

        /**
         * Save changes with a create or update
         */
        save() {
            if (this.resourceId) {
                this.update();
            } else {
                this.create();
            }
        },

        /**
         * Create a new resource.
         */
        create(form = this.form, callback = this.createSuccess) {
            Spark.post(this.resourceUri, form)
                .then(response => {
                    callback(response);
                })
                .catch(errors => {
                    this.handleErrors(errors);
                    reject(errors.data);
                });
        },

        /**
         * Update a resource.
         */
        update(form = this.form, callback = this.updateSuccess, handleErrors = this.handleErrors) {
            Spark.put(this.resourceUri, form)
                .then(response => {
                    callback(response);
                })
                .catch(errors => {
                    console.log(errors);
                    handleErrors(errors);
                    reject(errors);
                });
        },

        /**
         * Approve the deletion of the given resource.
         */
        approveDelete() {
            let vue = this;

            swal({
                title: "Are you sure?",
                text: "Do you really want to archive this?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, archive it!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                vue.delete();
            });
        },

        /**
         * Delete the given resource.
         */
        delete(callback = this.deleteSuccess) {
            this.$http.delete(this.resourceUri)
                .then(response => {
                    callback(response.data)
                })
                .catch(errors => {
                    this.handleErrors(errors);
                    reject(errors.data);
                });
        },

        /**
         * Approve the restoration of the given archived resource.
         */
        approveRestore() {
            let vue = this;

            swal({
                title: "Are you sure?",
                text: "Do you really want to restore this?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, restore it!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                vue.restore();
            });
        },

        /**
         * Restore the given resource.
         */
        restore(form = this.form, callback = this.restoreSuccess) {
            Spark.put(this.resourceUri + '/restore', form)
                .then(response => {
                    callback(response);
                })
                .catch(errors => {
                    this.handleErrors(errors);
                    reject(errors.data);
                });
        },

        restoreSuccess(response) {
            if (response && response.restored == 'true') {
                swal({
                    title: "Success!",
                    text: "Offer successfully restored.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function () {
                    window.location = window.location.origin + '/offers/archived';
                });
            } else {
                this.handleErrors(errors);
                return false;
            }
        },

        handleErrors(errors) {
            // catch all parent template
            // use child implementations
            // for more granular and
            // model specific
            // handling
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
            else {
                swal({
                    title: "Error.",
                    text: "It looks like Vacoda is having trouble connecting to the internet. Please check your connection and try again.",
                    type: "error",
                    confirmButtonText: "Ok",
                    customClass: "sweet-error"
                });
            }
        }
    }
};
