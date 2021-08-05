Vue.component('archived-banners', {
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
                    render: function (name, type, row) {
                        return `<a href="/banner/${row.id}/">${name}</a>`;
                    }
                },
                {data: "id"},
                {data: "start_date"},
                {data: "end_date"},
                {data: "status"},
                {
                    "data": "offer",
                    "render": function (offer) {
                        if (offer && typeof offer.name !== 'undefined') {
                            return offer.name;
                        }

                        return null;
                    }
                },

                {
                    "data": "offer.department",
                    "render": function (department) {
                        if (department && typeof department.abbreviation !== 'undefined') {
                            return department.abbreviation;
                        }

                        return null;
                    }
                },
            ],
            headers: [
                {name: "Name"},
                {name: "ID"},
                {name: "Start"},
                {name: "End"},
                {name: "Status"},
                {name: "Offer"},
                {name: "Dept."},
            ],
        };
    },
});