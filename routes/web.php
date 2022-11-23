<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

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
    return view('welcome');
});

// Route::get('/fbs', [FirebaseController::class, 'testing'])->name('data.user.index');
Route::get('/monitoring-data-kualitas-air-tambak', [FirebaseController::class, 'testing']);
Route::get('/loop', [FirebaseController::class, 'loop']);
