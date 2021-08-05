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
            this.setSelectedData();
        }
    },

    template: `
<select class="form-control resource-select" :name="fieldName" v-model="selected" style="width: 100%">
    <option value="">{{ placeholder }}</option>
    <option v-for="option in resourceOptions" v-bind:value="option.id">
        {{ option.name }}
    </option>
</select>`,

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

    ready() {
    },

    methods: {

        setSelectedData() {
            if (this.selected) {
                // return data via selected (id) property
                let selectedData = _.find(this.resourceOptions, function (item) {
                    return item.id.toString() === this.selected.toString();
                }, this);
                this.selectedData = selectedData;
            } else {
                this.selectedData = {};
            }
        },

        /**
         * Get the resource being managed.
         */
        getResourceOptions() {
            let vue = this;

            vue.$http.get(vue.resourceUri)
                .then(response => {
                    console.log('api-resource getResourceSuccess');
                    console.log('response');
                    console.log(response);

                    vue.resourceOptions = _.filter(response.data, function(item) {
                        return item.deleted_at == null;
                    });

                    setTimeout(function(){
                        var $select2 = $(`.resource-select[name=${vue.fieldName}]`);
                        $select2.select2();

                        // parent resource loaded and set selected prop before this ajax call was finished
                        if (vue.selected) {
                            $select2.change();
                            vue.setSelectedData();
                        }

                        $select2.on('change', function () {
                            vue.selected = this.value;
                        });
                    }, 0);
                });
        },
    }
});
