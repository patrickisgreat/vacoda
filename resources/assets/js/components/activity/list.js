Vue.component('activity', {
    mixins: [require('../datatables-list')],

    /**
     * The component's data.
     */
    data() {

        return {
            resourceUri: `/${this['resourceName']}`,
            resource: {},
            columns: [
                {data: "user.name"},
                {
                    data: "auditable_type",
                    render: function (type_class) {
                        return type_class.replace(/App\\/i, '');
                    }
                },
                {data: "auditable_id"},
                {
                    data: "created_at",
                    render: function (date) {
                        return moment(date).format('M/DD/YYYY h:mm:ss a');
                    }
                },
            ],
            headers: [
                {name: "User"},
                {name: "Resource"},
                {name: "Resource ID"},
                {name: "Timestamp"},
            ],
        };
    },
});