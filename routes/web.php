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

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/dataImport', [App\Http\Controllers\UfController::class, 'importData']);
Route::post('/getuf', [App\Http\Controllers\UfController::class, 'GetUfsJson'])->name('getuf');
Route::resource('/ufs', App\Http\Controllers\UfController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');