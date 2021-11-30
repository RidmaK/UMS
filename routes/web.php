<?php

use App\Http\Controllers\backend\CityController;
use App\Http\Controllers\backend\CountryController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\StateController;
use App\Http\Controllers\backend\UserChangePasswordController;
use App\Http\Controllers\backend\UserController;
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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);
Route::resource('departments', DepartmentController::class);

Route::post('users/{user}/change-password',[UserChangePasswordController::class,'change_password'])->name('users.change.password');
