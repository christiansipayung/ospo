<?php

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

// HOME
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Testing Relationship
Route::get('/index', "PurchaseController@index");

// PURCHASE ORDER USER
Route::get('/po', "PurchaseController@index_user");
Route::get('/po/{id}/edit', "PurchaseController@edit");
Route::put('/po/{id}/update', "PurchaseController@update");
Route::put('/po/{id}/cancel', "PurchaseController@cancelOrder");
Route::get('/po/create', "PurchaseController@forms");
Route::post('/po/create/store', "PurchaseController@store");

//APPROVAL FINANCE
Route::post('/f/po/{id}/approval', 'ApprovalController@f_approval');
Route::get('/f/po/approval', 'ApprovalController@showFinance');

//APPROVAL SUPERVISOR
Route::post('/s/po/{id}/approval', 'ApprovalController@s_approval');
Route::get('/s/po/approval', 'ApprovalController@showSupervisor');

// USERS
Route::get('/users', "UsersController@index");
Route::get('/users/{id}/edit', "UsersController@edit");
Route::put('/users/{id}/update', "UsersController@update");
Route::delete('/users/{id}', "UsersController@destroy");

// PURCHASE PURCHASING
Route::get('/po-p', "PurchaseController@index_p");
Route::put('/po-p/{id}/statusUpdate', "PurchaseController@status_update");

// ROLES
Route::get('/roles', "RolesController@index");
Route::get('/role-forms', "RolesController@forms");
Route::post('/role-add', "RolesController@store");
Route::delete('/role/{id}', "RolesController@destroy");

//DEPARTMENTS
Route::get('/department', "DepartmentController@index");
Route::get('/department-forms', "DepartmentController@forms");
Route::post('/department-add', "DepartmentController@store");
Route::get('/department/{id}/edit', "DepartmentController@edit");
Route::post('/department/{id}/update', "DepartmentController@update");
Route::delete('/role/{id}', "DepartmentController@destroy");

// AUTH
Auth::routes();





