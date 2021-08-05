<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
| * URLs begin with `/api`
| * Controllers are located in the `app/Http/Controllers/API` folder
| * Uses auth:api middleware
|
*/

Route::group([
    'prefix'     => 'api',
    'namespace'  => 'API',
    'middleware' => ['auth:api', 'registerPermissions', 'checkPermissions', 'TestingEnvironmentCheck'],
], function () {

    /*
    |--------------------------------------------------------------------------
    | API Resources
    |--------------------------------------------------------------------------
    |
    | Create RESTful routes for interacting with API Resources. Creates the
    | following methods:
    |
    | index     [GET]       list resources
    | store     [POST]      create resource
    | show      [GET]       read resource
    | update    [PUT]       update resource
    | destroy   [DELETE]    delete resource
    |
    | More info:
    | https://laravel.com/docs/5.2/controllers#restful-resource-controllers
    |
    */

    // archived offers
    Route::get('offer/archived', 'OfferController@archived');

    // restore offer
    Route::put('offer/{id}/restore', 'OfferController@restore');

    // offers
    Route::resource('offer', 'OfferController',
        ['except' => ['create', 'edit']]);

    // banner html
    Route::get('/banner/{id}/html', 'BannerController@html');

    // banner images
    Route::post('/banner/{id}/image', 'BannerController@uploadImage');

    // archived banners
    Route::get('banner/archived', 'BannerController@archived');

    // restore banner
    Route::put('banner/{id}/restore', 'BannerController@restore');

    // banners
    Route::resource('banner', 'BannerController',
        ['except' => ['create', 'edit']]);

    // templates
    Route::resource('template', 'TemplateController',
        ['except' => ['create', 'edit']]);

    // themes
    Route::resource('theme', 'ThemeController',
        ['except' => ['create', 'edit']]);

    // options
    Route::resource('option', 'OptionController',
        ['except' => ['create', 'edit']]);

    // option types
    Route::resource('option-type', 'OptionTypeController',
        ['except' => ['create', 'edit']]);

    // roles
    Route::get('/roles/teams/{team_id}', 'RoleController@index');
    Route::post('/roles/teams/{team_id}/update', 'RoleController@updateRoles');
    Route::delete('/roles/teams/{team_id}/role/{role_id}', 'RoleController@delete');

    // permissions
    Route::resource('permissions', 'PermissionController',
        ['except' => ['create', 'edit']]);

    // categories
    Route::get('/programs/', 'ProgramController@index');
    Route::get('/categories/', 'CategoryController@index');

    // reports
    Route::post('/report', 'ReportController@submit');

    // check a permission
    Route::get('permission/{permission}', function () {
        //
    })->middleware('checkPermissions');

    /*
    |--------------------------------------------------------------------------
    | Spark Extensions
    |--------------------------------------------------------------------------
    |
    | Supplement or extend built-in Spark functionality with custom routes.
    |
    */

    // update team details
    Route::put('/team/{team}/details', 'TeamDetailsController@update');

    // dev audit trail
    Route::get('/devaudit', 'DevAuditTrailController@list');

    // vacoda settings
    Route::get('/settings', 'VacodaSettingsController@show');
    Route::put('/settings', 'VacodaSettingsController@update');
});
