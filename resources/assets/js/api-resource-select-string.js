Vue.component('resource-select', {
    props: {
        resourceName: {
            type: String,
            required: true
        },

        fieldName: {
            type: String,
            default: function () {
                return this.resourceName + '_id';
            }
        },

        placeholder: {
            type: String,
            default: function () {
                return "Select " + this.resourceName[0].toUpperCase() + this.resourceName.slice(1);
            }
        },

        selected: [String, Number],

        selectedData: {
            type: Object,
            default: function () {
                return {};
            }
        },
    },

    watch: {
        selected() {
            // return data via selected (id) property
            let selectedData = _.find(this.resourceOptions, function (item) {
                return item.id.toString() === this.selected.toString();
            }, this);

            this.selectedData = selectedData;
        }
    },

    template: `
<div :name="fieldName" v-model="selected">
    <option value="">{{ placeholder }}</option>
    <option v-for="option in resourceOptions" v-bind:value="option.id">
        {{ option.name }}
    </option>
</div>`,

    data() {
        return {
            resourceUri: `/api/${this.resourceName}/`,
            resourceOptions: {},
        };
    },

    /**
     * Prepare the component.
     */
    created() {
        this.getResourceOptions();
    },

    methods: {
        /**
         * Get the resource being managed.
         */
        getResourceOptions() {
            this.$http.get(this.resourceUri)
                .then(response => {
                this.resourceOptions = response.data;
        });
        },
    }
});
