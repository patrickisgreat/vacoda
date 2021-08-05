Vue.component('banner-preview', {
    props: {
        fields: {},
        template: {},
        theme: {},

        type: {
            type: String,
            default: 'desktop'
        },
    },

    data() {

        return {
            currentTemplate: 'default'
        }
    },


    template: `
<div class="preview preview-{{ type }}"> 
    <div class="{{type}} preview-container">
        <partial :name="currentTemplate"></partial>
    </div>
</div>
`,

    partials: {
        'default': 'Please Choose a Template',
    },

    watch: {
        template() {
            if (!_.isEmpty(this.template)) {
                let partialName = 'template-' + this.template.id;
                Vue.partial(partialName, this.template.html);
                this.currentTemplate = partialName;
            } else {
                this.currentTemplate = 'default';
            }
        },
    },

    computed: {
        width() {
            switch (this.type) {
                case "mobile":
                    return this.template.width_mobile; //mobile
                    break;
                default:
                    return this.template.width_desktop; // desktop
            }
        },

    },
    methods: {
        scaleBannerPreview() {

        },

        // dispatchReadyState() {
        //     this.$dispatch('template-ready', 'ready');
        // }
    },

    ready() {
        // this.dispatchReadyState();
    }
});

/**
 * After page load.
 */

$(function () {

    //Toggle banner preview modals b/w each other
    $('.toggleModal').on('click', function () {
        $('#preview-modal-mobile').modal('toggle');
        $('#preview-modal-desktop').modal('toggle');
    });


    /**
     * Scale previews
     */
    //this works because there is an @change in the blade file associated to the div
    //form_name_input
    //@todo refactor to be within Vue structure
    //On page  triggering click
    $(window).load(function () {
        //window.setTimeout( bannerPreviewScale, 300 );
        window.setTimeout(function () {
            $(".form_name_input input").trigger('click');
        }, 30);

        window.setTimeout(function () {
            $(".panel-heading").trigger('click');
        }, 30);
    });

    //On template change triggering click
    $('.template-selection select').on('change keyup paste click', function () {
        $(".form_name_input input").trigger('click');
    });

});




