Vue.component('alerts', {
    mixins: [require('../datatables-list')],

    /**
     * The component's data.
     */
    data() {

        return {
            resourceUri: `/${this['resourceName']}s`,
            resource: {},
            columns: [
                {data: "id"},
                {data: "type"},
                {data: "entity_id"},
                {data: "alert"},
                {data: "label"},
                {data: "created_at"},
            ],
            headers: [
                {name: "ID"},
                {name: "Type"},
                {name: "Entity ID"},
                {name: "Error Message"},
                {name: "Label"},
                {name: "Created At"},
            ],
        };
    },
});