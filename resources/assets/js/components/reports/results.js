module.exports = {
    props: {
        reportData: [],
    },

    data() {
        return {
            headers: [],
            columns: [],
        }
    },

    template: `
<div>
    <table>
        <thead>
            <tr>
                <th v-for='header in headers'>{{ header.name }}</th>
            </tr>
        </thead>
    </table>
</div>`,

    created() {
        this.buildResultsTable();
    },

    ready() {
        this.renderResultsTable();
    },

    methods: {
        buildResultsTable() {
            let headers = [],
                columns = [],
                firstResult = this.reportData[0];

            console.log('reportData');
            console.log(this.reportData);

            console.log('firstResult');
            console.log(firstResult);

            if (!_.isEmpty(firstResult)) {
                console.log('!_.isEmpty(firstResult)');

                // Banner ID
                if (firstResult.hasOwnProperty('banner_id')) {
                    console.log("hasOwnProperty('banner_id')");
                    headers.push({name: 'Banner ID'});
                    columns.push({data: 'banner_id'});
                }

                // Banner Name
                if (firstResult.hasOwnProperty('banner_name')) {
                    console.log("hasOwnProperty('banner_name')");
                    headers.push({name: 'Banner Name'});
                    columns.push({data: 'banner_name'});
                }

                // Marketing Segmentation
                if (firstResult.hasOwnProperty('category')) {
                    headers.push({name: 'Marketing Segmentation'});
                    columns.push({data: 'category'});
                }

                // Date
                if (firstResult.hasOwnProperty('date')) {
                    headers.push({name: 'Date'});
                    columns.push({data: 'date'});
                }

                // Sent
                if (firstResult.hasOwnProperty('sent')) {
                    headers.push({name: 'Sent'});
                    columns.push({data: 'sent'});
                }

                // Bounce
                if (firstResult.hasOwnProperty('bounce')) {
                    headers.push({name: 'Bounce Rate'});
                    columns.push({data: 'bounce'});
                }

                // Open
                if (firstResult.hasOwnProperty('open')) {
                    headers.push({name: 'Open Rate'});
                    columns.push({data: 'open'});
                }

                // Click
                if (firstResult.hasOwnProperty('click')) {
                    headers.push({name: 'Click Rate'});
                    columns.push({data: 'click'});
                }
            }

            console.log('headers');
            console.log(headers);

            console.log('columns');
            console.log(columns);

            this.headers = headers;
            this.columns = columns;
        },

        renderResultsTable() {
            let options = {
                data: this.reportData,
                columns: this.columns,
                dom: 'tB',
                buttons: [
                    'csv',
                    'print',
                ],
                order: [[ 0, "desc" ]],
                // destroy: true,
                // paging: false,
                // scrollY: 400,
            };

            $(this.$el).find('table').DataTable(options);
        },
    },
};
