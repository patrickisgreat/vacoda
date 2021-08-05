Vue.component('themes', {
    mixins: [require('../datatables-list')],

    /**
     * The component's data.
     */
    data() {
        let vue = this;

        return {
            columns: [
                {data: "id"},
                {data: "name"},
                {data: "font_color"},
                {data: "font_color_secondary"},
                {data: "cta_font_color"},
                {data: "cta_bg_color"},
                {data: "background_color"},
                {
                    data: "id",
                    render: function(id) {
                        return `<a href="/${vue.resourceName}/${id}/">Edit</a>`;
                    }
                },
            ],
            headers: [
                {name: "ID"},
                {name: "Name"},
                {name: "Font Color"},
                {name: "Font Color 2"},
                {name: "CTA Font Color"},
                {name: "CTA BG Color"},
                {name: "Background Color"},
                {name: "Edit"},
            ],
        };
    },
});
