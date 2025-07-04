<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

// specialty routes
Route::get('/specialties', [SpecialtyController::class, 'index'])->name('specialties.index');
Route::get('/specialties/create', [SpecialtyController::class, 'create'])->name('specialties.create');
Route::post('/specialties', [SpecialtyController::class, 'store'])->name('specialties.store');
Route::get('/specialties/{specialty}', [SpecialtyController::class, 'show'])->name('specialties.show');
Route::get('/specialties/{specialty}/edit', [SpecialtyController::class, 'edit'])->name('specialties.edit');
Route::put('/specialties/{specialty}', [SpecialtyController::class, 'update'])->name('specialties.update');
Route::delete('/specialties/{specialty}', [SpecialtyController::class, 'destroy'])->name('specialties.destroy');

// doctor routes
Route::resource('doctors', DoctorController::class);