Vue.component('list-edit-roles', {
    mixins: [
        require('../api-resource')
    ],

    props: ['user', 'team', 'resourceId'],

    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: `/api/roles/teams/${this.team.id}`,
            updatingUri: `/api/roles/teams/${this.team.id}/update`,
            permissionsUri: '/api/permissions',
            deletingRole: "",
            list: true,
            allPermissions: [],
            allRolesCount: '',
            addingMultipleRoles: false,
            roles: [{
                name: '',
                label: '',
                id: '',
                selectedPermissions: []
            }],
            form: new SparkForm({
                name: '',
                newRoleSelectedPermissions: []
            }),
            deleteRoleForm: new SparkForm({})
        };
    },

    created() {

    },

    /**
     * Prepare the component.
     */
    ready() {

    },

    events: {
        updateRolesHere() {
            this.getResource();
        }
    },

    methods: {

        /**
         * Called after the resource is retrieved.
         */
            //
        getResourceSuccess() {
            if (typeof this.resource != "undefined")
            {
                this.allPermissions = this.resource.allPermissions;
                this.allRolesCount = this.resource.allRolesCount;
                let roles = this.resource.roles;
                this.roles = this.setSelectedPermissions(roles, this.allPermissions);
            }
        },

        /**
         * loops through each role, mapping all of the system permissions
         * to each role's permissions relation nested array and sets
         * boolean values for the permissions that are selected
        */
        setSelectedPermissions(roles, allPermissions) {
            try {
            roles.forEach(function (role) {
                role.permissions = allPermissions.map(function (perm) {
                    return {
                        id: perm.id,
                        name: perm.name,
                        label: perm.label,
                        selected: role.permissions.some(function (rolePerm) {
                            return rolePerm.name === perm.name
                        })
                    }
                });
            });
            } catch (e) {
                console.log(e);
            }
            return roles;
        },

        /**
         * Update an resource.
         */
        update() {
            this.roles.forEach( function (role) {
                role.selectedPermissions = [];
                _.each(role.permissions, function (v, k) {
                    if (v.selected === true) {
                        role.selectedPermissions.push(v.id);
                    }
                });
            });

            let roles = JSON.stringify(this.roles);

            //@todo may look at making this go through Spark object ?
            this.$http.post(this.updatingUri, roles)
                .then(() => {
                    this.updateSuccess();
                }).catch( function (err){
                    console.log(err);
                });
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess() {
            this.$dispatch('updateRolesHere');
            this.addingMultipleRoles = false;
            this.$dispatch('broadCastRolesUpdate');
            $('#modal-update-team-roles').modal('show');
        },


        addRole() {
            //commented out because not in use but left in case we go with a different UI implementation
            //$('#modal-create-team-roles').modal('show');
            let vue = this,
                new_role_id,
                count;

            let allPerms = _.map(vue.allPermissions, function (perm){
                return {
                    id: perm.id,
                    name: perm.name,
                    label: perm.label
                }
            });

            if (vue.addingMultipleRoles === false)  {
                new_role_id = Number(vue.allRolesCount) + 1;
                vue.addingMultipleRoles = 1;
            } else if (vue.addingMultipleRoles) {
                vue.addingMultipleRoles++;
                new_role_id = Number(vue.allRolesCount) + vue.addingMultipleRoles;
                console.log(new_role_id);
            }
            this.roles.push({
                id: new_role_id,
                label: '',
                name: 'Name Me',
                permissions: allPerms,
                newRole: true
            });
            this.$nextTick( function (){
                $('i.'+new_role_id+'').removeClass('red');
            });
        },

        /**
         * Delete the given role.
         */
        delete() {
            Spark.delete(this.urlForDeleting, this.deleteRoleForm)
                .then(() => {
                    this.$dispatch('updateRolesHere');
                    this.$dispatch('broadCastRolesUpdate');
                    $('#modal-delete-role').modal('hide');

                });
        },

        /**
         * Display the approval modal for the deletion of a Role.
         */
        approveRoleDelete(role) {
            this.deletingRole = role;
            //if the role wasn't actually persisted to db just remove it from data
            if (this.deletingRole.newRole) {
                this.roles.pop();
            } else {
                $('#modal-delete-role').modal('show');
            }
        },

        /**
         * various click handlers
         */
        clearNewRoleText(role, index) {
            if (role.name == "Name Me") {
                this.roles[index].name = ""
            }
        },

        /**
         * Show the Permissions on click
         */
        showTheRolesPermissions(selector) {
            let rolesList = 'ul#'+selector,
                rolesLink = 'span.roles-name.'+selector,
                icon = 'i.'+selector;
            $(rolesList).slideToggle( "slow", function() {
                if ($(this).is(':visible'))  {
                    $(icon).removeClass('fa-plus').addClass('fa-minus');
                } else {
                    $(icon).removeClass('fa-minus').addClass('fa-plus');
                }
            });
        },

    },

    computed: {
        /**
         * Get the URL for deleting a role.
         */
        urlForDeleting() {
            return `/api/roles/teams/${this.team.id}/role/${this.deletingRole.id}`;
        }
    }
});