<?php

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

Route::get('/', 'UserController@Index')->name('home');
Route::post('/logout', 'UserController@postLogout')->name('postLogout');

Route::group(['middleware' => 'visitor'], function() {
    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@postLogin')->name('postLogin');

});

Route::group(['middleware' => 'superAdmin'], function() {
    Route::get('/superAdmin/', function(){
        return redirect()->route('superAdmin.dashboard');
    });
    Route::get('/superadmin/dashboard', 'superAdmin\UserController@Dashboard') ->name('superAdmin.dashboard');
    // Route::get('/superadmin/client/addClient', 'superAdmin\ClientController@addClient') ->name('superAdmin.client.addClient');
    // Route::get('/superadmin/client/storeClient', 'superAdmin\ClientController@storeClient') ->name('superAdmin.client.storeClient');

    Route::resource('superadmin/admin', 'superAdmin\AdminController', ['names' => [
        'index'   => 'superAdmin.admin.list',
        'show'    => 'superAdmin.admin.show',
        'create'  => 'superAdmin.admin.create',
        'store'   => 'superAdmin.admin.store',
        'edit'    => 'superAdmin.admin.edit',
        'update'  => 'superAdmin.admin.update',
        'destroy' => 'superAdmin.admin.destroy'
    ]]);

    Route::resource('superadmin/client', 'superAdmin\ClientController', ['names' => [
        'index'   => 'superAdmin.client.list',
        'show'    => 'superAdmin.client.show',
        'create'  => 'superAdmin.client.create',
        'store'   => 'superAdmin.client.store',
        'edit'    => 'superAdmin.client.edit',
        'update'  => 'superAdmin.client.update',
        'destroy' => 'superAdmin.client.destroy'
    ]]);

    Route::resource('superadmin/minerba', 'superAdmin\MinerbaController', ['names' => [
        'index'   => 'superAdmin.minerba.list',
        'show'    => 'superAdmin.minerba.show',
        'create'  => 'superAdmin.minerba.create',
        'store'   => 'superAdmin.minerba.store',
        'edit'    => 'superAdmin.minerba.edit',
        'update'  => 'superAdmin.minerba.update',
        'destroy' => 'superAdmin.minerba.destroy'
    ]]);
});


Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/', function(){
        return redirect()->route('admin.dashboard');
    });
    // Shipping 
    Route::get('/admin/dashboard', 'admin\UserController@Dashboard') ->name('admin.dashboard');
    Route::get('/admin/shipping', 'admin\ShippingController@create') ->name('admin.shipping.form');
    Route::post('/admin/shipping/store', 'admin\ShippingController@store') ->name('admin.shipping.store');
    Route::post('/admin/shipping/update{id}', 'admin\ShippingController@update') ->name('admin.shipping.update');
    Route::get('/admin/shipping/list', 'admin\ShippingController@list') ->name('admin.shipping.list');
    Route::get('/admin/shipping/edit/{id}', 'admin\ShippingController@edit') ->name('admin.shipping.edit');
    Route::get('/admin/shipping/delete/{id}', 'admin\ShippingController@delete') ->name('admin.shipping.delete');
    Route::get('/admin/shipping/detail/{id}', 'admin\ShippingController@detail') ->name('admin.shipping.detail');


    //Report
    Route::get('/admin/report/add', 'admin\ReportController@index') ->name('admin.report.add');
    Route::get('/admin/report/form/{id}', 'admin\ReportController@create') ->name('admin.report.form');
    Route::post('/admin/report/store', 'admin\ReportController@store') ->name('admin.report.store');
    Route::post('/admin/report/update{id}', 'admin\ReportController@update') ->name('admin.report.update');
    Route::get('/admin/report/list', 'admin\ReportController@list') ->name('admin.report.list');
    Route::get('/admin/report/edit/{id}', 'admin\ReportController@edit') ->name('admin.report.edit');
    Route::get('/admin/report/delete/{id}', 'admin\ReportController@destroy') ->name('admin.report.destroy');

    //Image
    Route::get('/admin/image/add', 'admin\ImageController@index') ->name('admin.image.add');
    
    
});