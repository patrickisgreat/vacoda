Vue.component('activity-widget', {
    /**
     * The component's properties.
     */
    props: ['team', 'currentTeam'],

    data() {
        return {
            user: Spark.state.user,
            resourceUri: `activity`,
            activity: {},
        };
    },

    computed: {
        firstSixActivity() {
            return this.activity.slice(0, 6);
        }
    },

    created() {
        this.$http.get(this.resourceUri)
            .then(response => {
                console.log('response');
                console.log(response);
                this.activity = response.data;
                this.getResourceSuccess();
            });


        this.updateLastSeenActivity();
    },


    methods: {
        dateTime(date) {
            return moment(date).format('M/DD/YYYY h:mm a');
        },

        resourceName(className) {
            return className.replace(/App\\/i, '');
        },

        resourceRoute(className, resourceId) {
            return `${this.resourceName(className).toLowerCase()}/${resourceId}`;
        },

        /**
         * Update the last seen alerts timeStamp
         */
        updateLastSeenActivity() {
            this.$http.get('/last-seen-activity-at')
                .then(() => {
                    this.$dispatch('updateUser');
                });
        },
    },

});
