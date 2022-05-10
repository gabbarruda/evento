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
Route::get('/evento/create', [EventoController::class, 'create'])->name('create')->middleware('auth');
Route::get('/evento/{id}', [EventoController::class, 'show'])->name('show');
Route::post('/evento', [EventoController::class, 'store'])->name('store');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventoController::class, 'dashboard'])->middleware('auth');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
