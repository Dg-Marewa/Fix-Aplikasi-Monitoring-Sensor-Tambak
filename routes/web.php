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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/fbs', [FirebaseController::class, 'testing'])->name('data.user.index');
Route::get('/', [FirebaseController::class, 'testing']);
Route::get('/log_data', [FirebaseController::class, 'logData'])->name('log');
Route::get('/grafik_data', [FirebaseController::class, 'grafikData'])->name('grafik');
// Route::get('/proses_menyimpan_data', [FirebaseController::class, 'proses']);
// Route::get('/loop', [FirebaseController::class, 'loop']);
