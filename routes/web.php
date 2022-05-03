<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" d group. Now create something great!
|
*/
use App\Http\Controllers\EventoController;

Route::get('/', [EventoController::class, 'index']);
Route::get('/evento/create', [EventoController::class, 'create']);
Route::post('/evento', [EventoController::class, 'store']);

Route::get('/contact', function () {
    return view('contact');
});

