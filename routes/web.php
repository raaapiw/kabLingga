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

    Route::resource('superadmin/bapenda', 'superAdmin\BapendaController', ['names' => [
        'index'   => 'superAdmin.bapenda.list',
        'show'    => 'superAdmin.bapenda.show',
        'create'  => 'superAdmin.bapenda.create',
        'store'   => 'superAdmin.bapenda.store',
        'edit'    => 'superAdmin.bapenda.edit',
        'update'  => 'superAdmin.bapenda.update',
        'destroy' => 'superAdmin.bapenda.destroy'
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
    Route::get('/admin/shipping/approve/{id}', 'admin\ShippingController@approve') ->name('admin.shipping.approve');
    Route::post('/admin/shipping/storeApprove', 'admin\ShippingController@storeApprove') ->name('admin.shipping.storeApprove');
    Route::get('/admin/shipping/print/{id}', 'admin\ShippingController@print')->name('admin.shipping.print');

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
    Route::get('/admin/image/form/{id}', 'admin\ImageController@create') ->name('admin.image.form');
    Route::post('/admin/image/store', 'admin\ImageController@store') ->name('admin.image.store');
    Route::post('/admin/image/update{id}', 'admin\ImageController@update') ->name('admin.image.update');
    Route::get('/admin/image/list', 'admin\ImageController@list') ->name('admin.image.list');
    Route::get('/admin/image/edit/{id}', 'admin\ImageController@edit') ->name('admin.report.edit');
    Route::get('/admin/image/delete/{id}', 'admin\ImageController@destroy') ->name('admin.image.destroy');
    Route::get('/admin/image/detail/{id}', 'admin\ImageController@detail') ->name('admin.image.detail');

    Route::get('/postlingga', 'admin\ShippingController@post_lingga');
});

Route::group(['middleware' => 'bapenda'], function() {
    Route::get('/bapenda/', function(){
        return redirect()->route('bapenda.dashboard');
    });

    Route::get('/bapenda/dashboard', 'bapenda\UserController@dashboard') ->name('bapenda.dashboard');
    // Shipping
    Route::get('/bapenda/shipping/list', 'bapenda\ShippingController@list') ->name('bapenda.shipping.list');
    Route::get('/bapenda/shipping/detail/{id}', 'bapenda\ShippingController@detail') ->name('bapenda.shipping.detail');

    //Client
    Route::get('/bapenda/client/list', 'bapenda\ClientController@index')->name('bapenda.client.list');
    Route::get('/bapenda/client/detail/{id}', 'bapenda\ClientController@detail')->name('bapenda.client.detail');

});

Route::group(['middleware' => 'supervisor'], function() {
    Route::get('/supervisor/', function(){
        return redirect()->route('supervisor.dashboard');
    });
    Route::get('/supervisor/dashboard', 'supervisor\UserController@dashboard') ->name('supervisor.dashboard');
    Route::get('/supervisor/report/list', 'supervisor\ReportController@list')->name('supervisor.report.list');
    Route::get('/supervisor/report/create/{id}', 'supervisor\ReportController@form')->name('supervisor.report.form');
    Route::get('/supervisor/report/reject/{id}', 'supervisor\ReportController@reject')->name('supervisor.report.reject');
    Route::post('/supervisor/report/update{id}', 'supervisor\ReportController@update')->name('supervisor.report.update');
    Route::post('/supervisor/reject{id}', 'supervisor\ReportController@rejectup')->name('supervisor.report.rejectup');

    Route::get('/qrcode', 'supervisor\ReportController@qrcode');
});
