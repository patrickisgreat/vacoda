Vue.component('home', {
    props: ['user', 'team'],

    data() {
        return {
            permissionRoute: 'permission',
            resourceUri: `/api/permissions`,
            resource: {},
            UserDashboard: '',
            TeamDashboard: ''
        }
    },
    init() {
        this.$http.get(this.resourceUri)
            .then(response => {
            this.resource = response;
            let hasPermission = this.checkUsersPermission('show_user');
        });

    },
    ready(){

    },
    methods: {
        checkUsersPermission(permission, response) {
            let hasPermission;
            this.$http.get('api/'+ this.permissionRoute + '/' + permission)
                .then(response => {
                hasPermission = response.hasPermission;
                console.log(response);
                if(response.status === 200){

                    this.UserDashboard = true;
                }
                });
                return hasPermission;
        }
    }
});





