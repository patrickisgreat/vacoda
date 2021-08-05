Vue.component('offers', {
    mixins: [require('../datatables-list')],

    /**
     * The component's data.
     */
    data() {
        let vue = this;

        return {
            columns: [

                {
                    data: "name",
                    render: function(name, type, row) {
                        return `<a href="/${vue.resourceName}/${row.id}/">${name}</a>`;
                    }
                },
                {data: "id"},
                {data: "start_date"},
                {data: "end_date"},

                {
                    "data": "owner",
                    "render": function (owner) {
                        if (owner && typeof owner.name !== 'undefined') {
                            return owner.name;
                        }

                        return null;
                    }
                },

                {
                    "data": "department",
                    "render": function (department) {
                        if (department && typeof department.abbreviation !== 'undefined') {
                            return department.abbreviation;
                        }

                        return null;
                    }
                },
                {data: "external_offer_id"},
            ],
            headers: [

                {name: "Name"},
                {name: "ID"},
                {name: "Start Date"},
                {name: "End Date"},
                {name: "Owner"},

                {name: "Dept."},
                {name: "EOID"},
            ],
        };
    },
});
