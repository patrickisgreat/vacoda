Vue.component('needs-review-widget', {
    /**
     * The component's properties.
     */
    props: {
        team: {}

    },

    data() {
        return {
            resourceUri: `/api/banner`,
            resources: {},
            pendingResources: {},
            needsReviewSort: -1,
        };
    },
    computed: {
        sortOrder() {
            if (this.needsReviewSort == -1) {
                return "Most Recent"
            }
            if (this.needsReviewSort == 1) {
                return "Oldest"
            }
        },
    },

    created() {
        this.$http.get(this.resourceUri)
            .then(response => {
                console.log('response');
                console.log(response);
                this.resources = response.data;
                this.getResourceSuccess();
        });
    },

    methods: {
        getResourceSuccess() {
            var vue = this;

            this.pendingResources = this.resources.filter(function (resource) {
                return resource.status == "Pending"
            });

        },
    },

    ready()  {
        $(document).ready(function () {

        });
    },

});
