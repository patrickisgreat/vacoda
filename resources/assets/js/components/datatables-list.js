module.exports = {
    props: ['resourceName'],

    mixins: [require('./check-permission')],

    template: `
<table>
    <thead>
        <tr>
            <th v-for='header in headers'>{{ header.name }}</th>
        </tr>
    </thead>
</table>`,

    data() {
        return {
            resourceUri: `/api/${this['resourceName']}`,
            resource: {}
        };
    },

    /**
     * Prepare the component.
     */
    created() {
        let vue = this;
        vue.$http.get(vue.resourceUri)
            .then(response => {
                console.log('response');
                console.log(response);
                
                if (vue.resourceUri.includes('archived')) {
                    vue.resource = _.filter(response.data, function(item) {
                        return item.deleted_at != null;
                    });
                } else {
                    vue.resource = _.filter(response.data, function(item) {
                        return item.deleted_at === null;
                    });
                }
                this.getResourceSuccess();
            });
    },

    methods: {
        dtNoWrap(){
            $(".dataTable").addClass("nowrap");
        },
        getResourceSuccess() {
            var vue = this;

            var default_options = {
                dom: 'flrtpBi',
                buttons: [
                    'csv',
                    'excelFlash',
                    'pdfFlash',
                    'print',
                ],
                columns: this.columns,
                data: this.resource,
                order: [[ 1, "desc" ]],
                language: {
                    "lengthMenu": "Show _MENU_",
                    "search": "",
                    "searchPlaceholder": "Search",
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                }
            };

            let hasPermission = this.checkPermission('export_' + this['resourceName']);

            if (hasPermission == 'Forbidden') {
                default_options.buttons = [

                ]
            }
            $(vue.$el).DataTable(default_options);
            this.dtNoWrap();

        },
    }

};

$(function () {

    $(document).ready(function () {
        $(".dataTable").addClass("nowrap");
    });

});
