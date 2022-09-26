<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\BrouillardController;
use App\Http\Controllers\DashboardController;
;

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
    return redirect('dashboard');
});

Route::get('/login', function () { return view('login');})->name('login');
Route::get('/register', function () { return view('register');})->name('register');

Route::post('/login',[UserController::class,'login'])->name('auth.connect');
Route::post('/register',[UserController::class,'register'])->name('auth.register');


Route::get('disconnect', [UserController::class, 'disconnect'])->name('disconnect');

Route::resources([
    'dashboard'=>DashboardController::class,
    'cotisation'=>CotisationController::class,
    'membre'=>MembreController::class,
    'brouillard'=>BrouillardController::class,
],['middleware' => ['auth']]);

