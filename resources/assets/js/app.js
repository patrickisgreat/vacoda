/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Spark which are
 | libraries such as Vue and jQuery. This also loads the Spark helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we'll create the root Vue application for Spark. This will start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */
window.Handlebars = require('handlebars');
//require('./lib/swalExtend');
require('spark-bootstrap');
require('bootstrap-datepicker');
require('moment');
require('fullcalendar');
require('eonasdan-bootstrap-datetimepicker');
require('bootstrap-select');
require('datatables.net')(window, $);
require('datatables.net-buttons')(window, $);
require('datatables.net-buttons/js/buttons.colVis.js')(window, $);
require('datatables.net-buttons/js/buttons.html5.js')(window, $);
require('datatables.net-buttons/js/buttons.flash.js')(window, $);
require('datatables.net-buttons/js/buttons.print.js')(window, $);
require('./components/bootstrap');
require('jstree');
require('select2');

var app = new Vue({
    mixins: [require('spark')]
});
