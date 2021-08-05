Vue.component('array-select', {
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
    methods: {
        scalePreview(){
            var vue = this;
            console.log('template name from array select');
            console.log(typeof vue.template.name);
            if (typeof vue.template.name != "undefined" && !vue.template.name.includes('362px')) {
                return;
            }
            //Desktop scaling
            this.previewDesktopHeight = $("#previews .preview-desktop .banner-container").height();
            if (this.previewDesktopHeight > 169) {
                this.desktopScaleRatio = (169 / this.previewDesktopHeight).toFixed(2);
            }
            else {
                this.desktopScaleRatio = 1;
            }
            $("#previews .preview-desktop .banner-container").css('transform', 'scale(' + this.desktopScaleRatio + ')');

            //Mobile scaling
            this.previewMobileHeight = $("#previews .preview-mobile .banner-container").height();
            if (this.previewMobileHeight > 169) {
                this.mobileScaleRatio = (169 / this.previewMobileHeight).toFixed(2);
            }
            $("#previews .preview-mobile .banner-container").css('transform', 'scale(' + this.mobileScaleRatio + ')');

        },
    },

    watch: {
        selected() {

            // return data via selected (id) property
            let selectedData = _.find(this.resourceOptions, function (item) {
                return item.id.toString() === this.selected.toString();
            }, this);

            this.selectedData = selectedData;
            //refreshing selected val on theme selectpicker

            $('.theme-selection select').selectpicker('refresh');

        }
    },

    template: `
<select class="form-control array-select" :name="fieldName" v-model="selected" size="4">
    <option value="">{{ placeholder }}</option>
    <option v-for="option in resourceOptions" v-bind:value="option.id" data-content="<span style='background-color:{{ option.background_color }};color: {{ option.font_color }};' class='label'>Aa</span>  {{ option.name }}">
        {{ option.name }}
    </option>
</select>`,
});

