<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index']);


Route::get('/home', [HomeController::class, 'home']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myappointment', [HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);




Route::middleware(['auth', 'admin'])->group(function () {
    // Rotte che richiedono permessi amministratore
    Route::get('/show_doctors', [AdminController::class, 'show_doctors']);
    Route::get('/show_appointments', [AdminController::class, 'show_appointments']);
    Route::post('/send-visit-reminder-email/{userId}', [AdminController::class, 'sendVisitReminder'])->name('send-visit-reminder-email');
    Route::get('/show_clients', [AdminController::class, 'show_clients']);


    Route::get('/approved/{id}', [AdminController::class, 'approved']);
    Route::get('/canceled/{id}', [AdminController::class, 'canceled']);
    
    Route::get('/updated/{id}', [AdminController::class, 'updated']);
    Route::get('/deleted/{id}', [AdminController::class, 'deleted']);
    
    Route::post('/edit_doctor/{id}', [AdminController::class, 'edit_doctor']);
    
    Route::get('/add_visit', [AdminController::class, 'addvisit']);
    Route::post('/upload_visit', [AdminController::class, 'uploadvisit']);
    
    Route::get('/show_report', [AdminController::class, 'show_report']);
    
    Route::get('/generate_qr/{visitId}', [AdminController::class, 'generateQrCode']);
    
    Route::get('/visit/{visitId}', [AdminController::class, 'showVisit'])->name('visit.show');
    Route::get('/add_doctor_view', [AdminController::class, 'addview']);
    Route::post('/upload_doctor', [AdminController::class, 'upload']);
    
});