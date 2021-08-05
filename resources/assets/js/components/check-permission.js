module.exports = {
    /**
     * The component's data.
     */
    data() {
        return {

            permissionRoute: '/api/permission'
        };
    },

    methods: {
        /**
         * Get the resource being managed.
         */
        checkPermission(permission) {
            let vue = this;
            vue.$http.get(vue.permissionRoute + '/' + permission)
                .then(response => {
                    vue.permissionResponse = response;
                    console.log('from within check-permission method')
                    console.log(vue.permissionResponse);
                    vue.checksPermissions();
                });
            }
        }

};
