Vue.component('option-types', {
    mixins: [require('../datatables-list')],

    /**
     * The component's data.
     */
    data() {
        let vue = this;

        return {
            columns: [
                {data: "id"},
                {data: "creator_id"},
                {data: "name"},
                {
                    data: "id",
                    render: function(id) {
                        return `<a href="/${vue.resourceName}/${id}/">Edit</a>`;
                    }
                },
            ],
            headers: [
                {name: "ID"},
                {name: "Creator ID"},
                {name: "Name"},
                {name: "Edit"},
            ],
        };
    },
});
