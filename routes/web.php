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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Frontend\HomeController@index');

Route::get('admin-login', 'Admin\AdminLoginController@index')->name('admin-log');
Route::post('admin-login-process', 'Admin\AdminLoginController@login')->name('admin-login');
Route::get('admin-register', 'Admin\AdminLoginController@register_view');
Route::post('admin-register-process', 'Admin\AdminLoginController@register')->name('admin-register');
Route::get('admin-logout', 'Admin\AdminLoginController@logout')->name('admin-logout');

// no-access-pages
Route::get('forbidden', 'Restraction\ResController@forbi');
Route::get('not-found', 'Restraction\ResController@notfnd');

Route::group(['middleware'=>'auth'], function(){
    
});

Route::get('/admin-dashboard', 'Admin\AdminDashboard@index')->name('admin_dashboard')->middleware('AdminMiddleware');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;
Route::get('/verify','Auth\RegisterController@verifyUser')->name('verify.user');

Route::get('admin-dashboard', 'Backend\DashboardController@index')->name('dashboard')->middleware('Admin');
Route::get('admin-backend-users', 'Backend\DashboardController@users')->name('admin.backend.users')->middleware('Admin');
Route::get('admin-backend-users-view/{id}', 'Backend\DashboardController@users_view')->name('admin.user.view')->middleware('Admin');
Route::get('admin-backend-users-update-Role/{id}', 'Backend\DashboardController@Update_user_role')->name('admin.user.update_role')->middleware('Admin');
Route::post('admin-backend-users-update-Role-updated/{id}', 'Backend\DashboardController@Update_user_role_updated')->name('admin.user.update_role.updated')->middleware('Admin');

Route::get('manufacturer-dashboard', 'Manufacturer\ManufacturerController@index')->middleware('Manufacturer');