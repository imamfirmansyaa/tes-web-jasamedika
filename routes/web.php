<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Auth::routes();

// Route::get('/', 'HomeController@index')->name('welcome');

// Route::get('/', function () {
//     return view('auth/register');
// });
// Route::get('/', function () {
//     return view('users/create');
// });

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('vehicle', VehicleController::class);
Route::resource('users', UserController::class);
Route::resource('register', RegisterController::class);
Route::resource('login', LoginController::class);

Route::get('/vehicle/delete/{id}', [VehicleController::class, 'destroy']);
// Route::get('login', [VehicleController::class, 'login']);