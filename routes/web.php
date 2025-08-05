<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\SpecialtyController;
use App\Http\Controllers\Api\SpecialtyController as apiSpecialty;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\doctor\ScheduleController;
use App\Http\Controllers\Api\ScheduleController as apiSchedule;

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
Route::middleware(['auth'])->group(function () {
    // patient routes
    Route::get('/patient/appointments/create', [AppointmentController::class, 'create'])->name('patient.appointments.create');
    Route::post('/patient/appointments', [AppointmentController::class, 'store'])->name('patient.appointments.store');

    //json
    Route::get('specialties/{specialty}/doctors', [apiSpecialty::class, 'doctors']);
    Route::get('schedule/hours', [apiSchedule::class, 'hours']);
});
