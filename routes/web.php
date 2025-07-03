<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// specialty routes
Route::get('/specialties', [App\Http\Controllers\SpecialtyController::class, 'index'])->name('specialties.index');
Route::get('/specialties/create', [App\Http\Controllers\SpecialtyController::class, 'create'])->name('specialties.create');
Route::post('/specialties', [App\Http\Controllers\SpecialtyController::class, 'store'])->name('specialties.store');
Route::get('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'show'])->name('specialties.show');
Route::get('/specialties/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit'])->name('specialties.edit');
Route::put('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update'])->name('specialties.update');
Route::delete('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy'])->name('specialties.destroy');