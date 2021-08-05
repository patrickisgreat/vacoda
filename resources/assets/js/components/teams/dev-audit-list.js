Vue.component('dev-audit-list', {
    mixins: [require('../datatables-sfmc-list')],

    /**
     * The component's data.
     */
    data() {
        let vue = this;

        return {
            columns: [

                {data: "id"},
                {data: "name"},
                {data: "start_date"},
                {data: "end_date"},
                {data: "status"},
                {data: "campaign"},
            ],
            headers: [
                {name: "ID"},
                {name: "Name"},
                {name: "Start"},
                {name: "End"},
                {name: "Status"},
                {name: "Campaign"},
            ],
        };
    },
});
