Vue.component('team-categories', {
    mixins: [require('../api-resource')],
    props: ['user', 'team'],


    /**
     * The component's data.
     */
    data() {
        return {
            resourceUri: null,
            updatingUri: null,
            deletingCategory: null,
            categories: [],
            list: true,
            form: new SparkForm({

            })
        };
    },
    

    created() {
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
        },

        /**
         * Update the team details.
         */
        update() {
        },

        addCategory() {
            
        }
    }

});