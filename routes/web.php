<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard'], function () {
<<<<<<< HEAD
    Route::get('index', 'DashboardController@index')->name('dashboard.index');
    //Route::get('table', 'DashboardController@table');
=======
    Route::get('index', 'DashboardController@index')->name('dashboard.index');;
    Route::get('table', 'DashboardController@table');
>>>>>>> 921f398b317d1dbb7a2222ba6468637a98ddacc5
});

Route::group(['namespace' => 'Admin', 'prefix' => 'default'], function () {
    Route::get('details', 'DefaultController@getServices')->name('default.details');
    Route::get('service/providers/{service_id}', 'DefaultController@getServiceProviders')->name('default.service.providers');
    Route::get('service/sites/{service_id}', 'DefaultController@getServiceSites')->name('default.service.sites');
    Route::get('get-unit-list', 'DefaultController@getUnitList')->name('default.get-unit-list');
    Route::get('get-department-list', 'DefaultController@getDepartList')->name('default.get-department-list');
    Route::get('get-service-list', 'DefaultController@getServiceList')->name('default.get-service-list');
    Route::get('add', 'DefaultController@addService')->name('default.add');
    Route::post('insert', 'DefaultController@insertService')->name('default.insert');
    Route::get('edit/{unit_id}', 'DefaultController@editUnit')->name('default.edit');
    Route::post('update/{unit_id}', 'DefaultController@updateService')->name('default.update');
    Route::get('delete/provider/{unit_id}', 'DefaultController@deleteProvider')->name('default.provider.delete');
    Route::get('delete/site/{unit_id}', 'DefaultController@deleteSite')->name('default.site.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'unit'], function () {
    Route::get('details', 'UnitController@getUnits')->name('unit.details');
    Route::get('add', 'UnitController@addUnit')->name('unit.add');
    Route::post('insert', 'UnitController@insertUnit')->name('unit.insert');
    Route::get('edit/{unit_id}', 'UnitController@editUnit')->name('unit.edit');
    Route::post('update/{unit_id}', 'UnitController@updateUnit')->name('unit.update');
    Route::get('delete/{unit_id}', 'UnitController@deleteUnit')->name('unit.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'service'], function () {
    Route::get('details', 'ServiceController@getServices')->name('service.details');
    Route::get('get-department-list', 'ServiceController@getStateList')->name('service.get-department-list');
    Route::get('add', 'ServiceController@addService')->name('service.add');
    Route::post('insert', 'ServiceController@insertService')->name('service.insert');
    Route::get('edit/{service_id}', 'ServiceController@editService')->name('service.edit');
    Route::post('update/{service_id}', 'ServiceController@updateService')->name('service.update');
    Route::get('delete/{service_id}', 'ServiceController@deleteService')->name('service.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'provider'], function () {
    Route::get('details', 'ProviderController@getProviders')->name('provider.details');
    Route::get('add', 'ProviderController@addProvider')->name('provider.add');
    Route::post('insert', 'ProviderController@insertProvider')->name('provider.insert');
    Route::get('edit/{provider_id}', 'ProviderController@editProvider')->name('provider.edit');
    Route::post('update/{provider_id}', 'ProviderController@updateProvider')->name('provider.update');
    Route::get('delete/{provider_id}', 'ProviderController@deleteProvider')->name('provider.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'fees'], function () {
    Route::get('details', 'FeesController@getFees')->name('fees.details');
    Route::get('add', 'FeesController@addFees')->name('fees.add');
    Route::post('insert', 'FeesController@insertFees')->name('fees.insert');
    Route::get('edit/{fees_id}', 'FeesController@editFees')->name('fees.edit');
    Route::post('update/{fees_id}', 'FeesController@updateFees')->name('fees.update');
    Route::get('delete/{fees_id}', 'FeesController@deleteFees')->name('fees.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'department'], function () {
    Route::get('details', 'DepartmentController@getDepartments')->name('department.details');
    Route::get('add', 'DepartmentController@addDepartment')->name('department.add');
    Route::post('insert', 'DepartmentController@insertDepartment')->name('department.insert');
    Route::get('edit/{department_id}', 'DepartmentController@editDepartment')->name('department.edit');
    Route::post('update/{department_id}', 'DepartmentController@updateDepartment')->name('department.update');
    Route::get('delete/{department_id}', 'DepartmentController@deleteDepartment')->name('department.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'site'], function () {
    Route::get('details', 'SiteController@getSites')->name('site.details');
    Route::get('add', 'SiteController@addSite')->name('site.add');
    Route::post('insert', 'SiteController@insertSite')->name('site.insert');
    Route::get('edit/{site_id}', 'SiteController@editSite')->name('site.edit');
    Route::post('update/{site_id}', 'SiteController@updateSite')->name('site.update');
    Route::get('delete/{site_id}', 'SiteController@deleteSite')->name('site.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'condition'], function () {
    Route::get('details', 'ConditionController@getConditions')->name('condition.details');
    Route::get('add', 'ConditionController@addCondition')->name('condition.add');
    Route::post('insert', 'ConditionController@insertCondition')->name('condition.insert');
    Route::get('edit/{condition_id}', 'ConditionController@editCondition')->name('condition.edit');
    Route::post('update/{condition_id}', 'ConditionController@updateCondition')->name('condition.update');
    Route::get('delete/{condition_id}', 'ConditionController@deleteCondition')->name('condition.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'document'], function () {
    Route::get('details', 'DocumentController@getDocuments')->name('document.details');
    Route::get('add', 'DocumentController@addDocument')->name('document.add');
    Route::post('insert', 'DocumentController@storeDocument')->name('document.insert');
    Route::get('edit/{document_id}', 'DocumentController@ediDocument')->name('document.edit');
    Route::post('update/{document_id}', 'DocumentController@updatingDocument')->name('document.update');
    Route::get('delete/{document_id}', 'DocumentController@deleteDocument')->name('document.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'state'], function () {
    Route::get('details', 'stateController@getDetails')->name('state.details');
    Route::get('add', 'stateController@addstate')->name('state.add');
    Route::post('insert', 'stateController@insertstate')->name('state.insert');
    Route::get('edit/{state_id}', 'stateController@editstate')->name('state.edit');
    Route::post('update/{state_id}', 'stateController@updatestate')->name('state.update');
    Route::get('delete/{state_id}', 'stateController@deletestate')->name('state.delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
