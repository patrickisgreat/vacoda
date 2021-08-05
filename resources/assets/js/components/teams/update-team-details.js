Vue.component('update-team-details', {
    mixins: [require('../api-resource')],
    props: ['user', 'team'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: new SparkForm({
                description: '',
                team_contact_name: '',
                team_contact_email: '',
            })
        };
    },

    /**
     * Prepare the component.
     */
    ready() {
        this.form.description = this.team.description;
        this.form.team_contact_name = this.team.team_contact_name;
        this.form.team_contact_email = this.team.team_contact_email;
    },


    methods: {
        /**
         * Update the team details.
         */
        update() {
            Spark.put(`/api/team/${this.team.id}/details`, this.form)
                .then(() => {
                    this.$dispatch('updateTeam');
                    this.$dispatch('updateTeams');
                });
        }
    }
});


