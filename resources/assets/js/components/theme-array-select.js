/**
 * Created by maggiemartin on 30/11/16.
 */
Vue.component('theme-array-select', {
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

        resourceOptions: []
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
<select class="form-control array-select" :name="fieldName" v-model="selected" size="4">
    <option value="">{{ placeholder }}</option>
    <option v-for="option in resourceOptions" v-bind:value="option.id" >
        {{ option.name }}
    </option>
</select>`,
});
