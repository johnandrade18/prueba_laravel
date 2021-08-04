<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::resource('personal', PersonalController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::get('/home', [PersonalController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [PersonalController::class, 'index'])->name('home');
});
