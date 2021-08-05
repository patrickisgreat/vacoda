Vue.component('options', {
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
                {data: "abbreviation"},
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
                {name: "Abbreviation"},
                {name: "Edit"},
            ],
        };
    },
});
