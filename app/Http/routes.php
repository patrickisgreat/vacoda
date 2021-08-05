<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show')
    ->name('welcome');

Route::get('/home', 'HomeController@show')
    ->name('home');

Route::get('/register', 'WelcomeController@redirect');
Route::post('/register', 'WelcomeController@redirect');
Route::get('/logout', 'Auth\LoginController@logout');


//-----------------
// Offers
//-----------------

// list
Route::get('/offers', 'OfferController@index')
    ->name('offers');

// show
Route::get('/offer/{offer?}', 'OfferController@show')
    ->name('offer');

//archived offers
Route::get('/offers/archived', 'OfferController@archived')
    ->name('archived-offers');

// list child banners
Route::get('/offer/{offer}/banners', 'OfferController@banners')
    ->name('offer-banners');


//-----------------
// Banners
//-----------------

// list
Route::get('/banners', 'BannerController@index')
    ->name('banners');

// archived list
Route::get('/banners/archived', 'BannerController@archived')
    ->name('archived-banners');

// scheduled for auto-archive list
Route::get('/banners/scheduled', 'BannerController@scheduled')
    ->name('scheduled-banners');

// show
Route::get('/banner/{banner?}', 'BannerController@show')
    ->name('banner');


//-----------------
// Templates
//-----------------

// list
Route::get('/templates', 'TemplateController@index')
    ->name('templates');

// show
Route::get('/template/{template?}', 'TemplateController@show')
    ->name('template');


//-----------------
// Themes
//-----------------

// list
Route::get('/themes', 'ThemeController@index')
    ->name('themes');

// show
Route::get('/theme/{theme?}', 'ThemeController@show')
    ->name('theme');


//-----------------
// Options
//-----------------

// list
Route::get('/options', 'OptionController@index')
    ->name('options');

// show
Route::get('/option/{option?}', 'OptionController@show')
    ->name('option');


//-----------------
// Option Types
//-----------------

// list
Route::get('/option-types', 'OptionTypeController@index')
    ->name('option-types');

// show
Route::get('/option-type/{optionType?}', 'OptionTypeController@show')
    ->name('option-type');

// list child options
Route::get('/option-type/{optionType}/options', 'OptionTypeController@options')
    ->name('option-type-options');


Route::get('/settings/teams/roles', 'SparkExtensions\VacodaTeamMemberRoleController@all');

Route::post('/upload/{uploadType}', 'FileUploadController@dispatchImport');

Route::get('cats/{teamId?}', 'API\CategoryController@index');

Route::get('/alerts/{teamId?}', 'AlertController@index');

Route::get('/alerts-list', 'AlertController@listView')
    ->name('alerts-list');

Route::get('/activity', 'ActivityController@index');

Route::get('/activity-list', 'ActivityController@listView')
    ->name('activity-list');

Route::get('/test-alerts/{step?}', 'AlertController@test_alerts');

Route::get('/last-seen-activity-at', 'ActivityController@updateLastSeenActivity');

Route::get('/banner-activities/{id}', 'ActivityController@get_banner_activities');

//for testing back end --
Route::get('/devaudittest', 'API\DevAuditTrailController@list');

Route::get('/true_up_offer_dates', 'BannerController@true_up_offer_dates');

// reports
Route::get('/reports', 'ReportController@show')
    ->name('reports');
