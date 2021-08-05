var base = require('settings/teams/team-members');

Vue.component('spark-team-members', {
    mixins: [
        base,
        require('./../../../components/teams/list-edit-roles')
    ],

    data() {
        return {
            memberRoles:[
            ],
            selectedRoles: [],
            updatesTeamMemberForm: $.extend(true, new SparkForm({
                roles: [],
                team_id: this.team.id,
            }), Spark.forms.updateTeamMember),
        }
    },

    events: {
        rolesChanged() {
            this.getRoles();
            return true;
        }
    },

    created() {

    },

    ready() {

    },

    methods: {


        isOwner(member) {
            if (member.pivot.role == 'owner') {
                return 'Owner - All Powerful';
            }
        },

        /**
         * Edit the given team member.
         */
        editTeamMember(member) {
            this.updatingTeamMember = member;
            this.updatesTeamMemberForm.roles = _.map(this.updatingTeamMember.roles, function (role) {
                return '' + role.name;
            });
            this.selectedRoles = this.updatesTeamMemberForm.roles;
            $('#modal-update-team-member').modal('show');
        },


        /**
         * Update the team member.
         */
        update() {
            this.updatesTeamMemberForm.roles = this.selectedRoles;
            Spark.put(this.urlForUpdating, this.updatesTeamMemberForm)
                .then(() => {
                    this.$dispatch('updateTeam');

                    $('#modal-update-team-member').modal('hide');
                });
        },

        /**
         * OVERRIDE from parent
         * Get the available team member roles.
         */
        getRoles() {
            this.$http.get(`/api/roles/teams/${this.team.id}`)
                .then(response => {
                    this.roles = response.data.roles;
                });
        }

    }
});
