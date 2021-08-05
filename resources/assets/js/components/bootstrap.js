
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

// libraries
require('./../lib/jquery.taxonomyBrowser');

// File input plugin JS
require('./../lib/fileinput');

// spark component overrides & additions
require('./../spark-components/bootstrap');
require('./teams/update-team-details');
require('./teams/team-roles.js');
require('./teams/list-edit-import-categories.js');
require('./teams/team-categories.js');
require('./teams/list-edit-roles.js');
require('./teams/assign-roles-members.js');
require('./teams/dev-audit-list');
require('./teams/vacoda-settings');

// pages
require('./home');

// reusable components
require('./api-resource-search');
require('./api-resource-select');
require('./array-select');
require('./team-member-select');

// show components
require('./offers/show');
require('./templates/show');
require('./themes/show');
require('./options/show');
require('./option-types/show');

// banners
require('./banners/show');
require('./banners/categories');
require('./banners/preview');
require('./banners/banner-activities');

// reports
require('./reports/show');
require('./reports/results');

// list components
require('./alerts/alerts-list');
require('./banners/list');
require('./banners/archived-list');
require('./offers/list');
require('./offers/archived-list');
require('./templates/list');
require('./themes/list');
require('./options/list');
require('./option-types/list');
require('./activity/list');

// dashboard components
require('./dashboard/calendar-widget');
require('./dashboard/needs-review-widget');
require('./dashboard/alerts-widget');
require('./dashboard/activity-widget');
