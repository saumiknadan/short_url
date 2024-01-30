<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortnerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/short',[UrlShortnerController::class,'short'] );
// Route::get('/{id}',[UrlShortnerController::class,'show']);

Route::middleware('throttle:custom_limit')->group(function () {
    Route::post('/short', [UrlShortnerController::class,'short'] )->name('short.url');
    Route::get('/{id}', [UrlShortnerController::class,'show'] )->name('short.show');
});