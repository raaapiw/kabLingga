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
    Route::get('/admin/dashboard', 'admin\UserController@Dashboard') ->name('admin.dashboard');
});