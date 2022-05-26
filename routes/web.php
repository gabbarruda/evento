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

Route::get('/', [EventoController::class, 'index'])->name('home');
Route::get('/evento/create', [EventoController::class, 'create'])->name('create')->middleware('admin');
Route::get('/evento/{id}', [EventoController::class, 'show'])->name('show');
Route::post('/evento', [EventoController::class, 'store'])->name('store');
Route::delete('/evento/{id}', [EventoController::class, 'destroy'])->middleware('auth');
Route::get('/evento/edit/{id}', [EventoController::class, 'edit'])->middleware('auth');
Route::put('/evento/update/{id}', [EventoController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventoController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::post('/evento/join/{id}', [EventoController::class, 'joinEvento'])->name('joinEvento')->middleware('auth');

Route::delete('/evento/leave/{id}', [EventoController::class, 'leaveEvento'])->name('leaveEvento')->middleware('auth');


