<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontentController;
use App\Http\Controllers\AdminController;

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



Route::get('/', [FrontentController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::post('/appointment', [FrontentController::class, 'appointment']);
Route::get('/myappointment', [FrontentController::class, 'myappointment']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // doctors routes
    Route::get('/doctors', [AdminController::class, 'doctors']);
    Route::get('/adding_doctor', [AdminController::class, 'adding_doctor']);
    Route::post('/doctor/store', [AdminController::class, 'doctordata_store']);
    Route::get('/doctor/edit/{id}', [AdminController::class, 'doctordata_edit']);
    Route::post('/doctor/update/{id}', [AdminController::class, 'doctordata_update']);
    Route::get('/doctor/remove/{id}', [AdminController::class, 'doctordata_remove']);
    // department routes
    Route::get('/department', [AdminController::class, 'department']);
    Route::get('/department/adding_doctor', [AdminController::class, 'department_add']);
    Route::post('/department/store', [AdminController::class, 'department_store']);
    Route::get('/department/edit/{id}', [AdminController::class, 'department_edit']);
    Route::post('/department/update/{id}', [AdminController::class, 'department_update']);
    Route::get('/department/remove/{id}', [AdminController::class, 'department_remove']);
    // appointments route
    Route::get('/appointments', [AdminController::class, 'getAppointments']);
    Route::get('/appointment/edit/{id}', [AdminController::class, 'appointment_edit']);
    Route::get('/appointment/remove/{id}', [AdminController::class, 'appointment_remove']);
    Route::get('/appointment/approve/{id}', [AdminController::class, 'approve']);
    Route::get('/appointment/cancel/{id}', [AdminController::class, 'cancel']);
    // Send mail to user
    Route::get('/sendmail/{id}', [AdminController::class, 'sendmail']);
    Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);

});
