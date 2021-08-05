Vue.component('templates', {
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
                {data: "description"},
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
                {name: "Description"},
                {name: "Edit"},
            ],
        };
    },
});
