var base = require('settings/teams/team-settings');

Vue.component('spark-team-settings', {
    mixins: [base],

    events: {
        broadCastRolesUpdate() {
            this.$dispatch('rolesChanged');
            this.$broadcast('rolesChanged');
        }
    }
});
