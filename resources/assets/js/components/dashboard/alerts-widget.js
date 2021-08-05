Vue.component('alerts-widget', {
    /**
     * The component's properties.
     */
    props: {
        team: {}
    },

    data() {
        return {
            resourceUri: `alerts`,
            alerts: {},
        };
    },

    computed: {
        firstSixAlerts() {
            return this.alerts.slice(0, 6);
        }
    },

    created() {
        this.$http.get(this.resourceUri)
            .then(response => {
                console.log('response');
                console.log(response);
                this.alerts = response.data;
                this.getResourceSuccess();
            });

    },

    methods: {

        getResourceSuccess() {
            var vue = this;

        },

        dateTime(date) {
            return moment(date).format('MM/DD h:mm a');
        }
    },

    ready()  {

    },

});
