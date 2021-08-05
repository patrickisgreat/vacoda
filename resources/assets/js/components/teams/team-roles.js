Vue.component('team-roles', {
    mixins: [require('../api-resource')],
    props: ['user', 'team'],


    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: null,
            updatingUri: null,
            permissionsUri: null,
            deletingRole: null,
            list: true,
            roles: [
                {
                    name: '',
                    label: ''
                }
            ],
            form: new SparkForm({

            })
        };
    },

    created() {
        this.resourceUri = `/api/roles/teams/${this.team.id}`;
        this.updatingUri = `/api/roles/teams/${this.team.id}/update`;
        this.permissionsUri = `/api/permissions/teams/${this.team.id}`;
    },

    /**
     * Prepare the component.
     */
    ready() {

    },

    methods: {

        /**
         * Called after the resource is retrieved.
         */
        getResourceSuccess() {
            console.log('coming from team-roles');
            console.log(this.resource);
        },

        /**
         * Update the team details.
         */
        update() {
        }
    }

});