<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\SpecialtyController;
use App\Http\Controllers\doctor\ScheduleController;


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
Route::middleware(['auth', 'admin'])->group(function () {

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

    // patient routes
    Route::resource('patients', PatientController::class);
});
Route::middleware(['auth', 'doctor'])->group(function () {
    // doctor schedule routes
    Route::get('/doctor/schedule/edit', [ScheduleController::class, 'edit'])->name('doctor.schedule.edit');
    Route::post('/doctor/schedule', [ScheduleController::class, 'store'])->name('doctor.schedule.store');
    Route::delete('/doctor/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name('doctor.schedule.destroy');
});
// Route::middleware(['auth', 'patient'])->group(function () {
//     // patient routes
//     Route::get('/patient/schedule', [ScheduleController::class, 'index'])->name('patient.schedule.index');
//     Route::get('/patient/schedule/create', [ScheduleController::class, 'create'])->name('patient.schedule.create');
//     Route::post('/patient/schedule', [ScheduleController::class, 'store'])->name('patient.schedule.store');
//     Route::get('/patient/schedule/{schedule}', [ScheduleController::class, 'show'])->name('patient.schedule.show');
//     Route::get('/patient/schedule/{schedule}/edit', [ScheduleController::class, 'edit'])->name('patient.schedule.edit');
//     Route::put('/patient/schedule/{schedule}', [ScheduleController::class, 'update'])->name('patient.schedule.update');
//     Route::delete('/patient/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name('patient.schedule.destroy');
// });