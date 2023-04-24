<?php

use App\Http\Controllers\doctorDashboard\BookListController;
use App\Http\Controllers\doctorDashboard\DiagnosticController;
use App\Http\Controllers\doctorDashboard\DoctorReviewController;
use App\Http\Controllers\doctorDashboard\HomeController;
use App\Http\Controllers\doctorDashboard\InvoiceController;
use App\Http\Controllers\doctorDashboard\LaboratoryController;
use App\Http\Controllers\doctorDashboard\ProfileController;
use App\Http\Controllers\doctorDashboard\RayController;
use App\Http\Controllers\doctorDashboard\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', ]
], function(){
    Route::middleware(['auth:doctor'])->group(function () {
        
        Route::get('dashboard/doctor', [HomeController::class,'index'])->name('dashboard.doctor');

        // الخدمات
        Route::resource('services' , ServiceController::class)->except(['edit','create','show']);

        // الكشوفات
        Route::get('invoice',[InvoiceController::class,'index'])->name('doctor.invoices');
        Route::get('invoice/complete',[InvoiceController::class,'complete'])->name('doctor.invoices.complete');
        Route::get('invoice/review',[InvoiceController::class,'review'])->name('doctor.invoices.review');

        // التشخيصات
        Route::resource('diagnostics' , DiagnosticController::class);
        Route::post('add/review',[DiagnosticController::class,'addReview'])->name('add.review');

        // الاشعة
        Route::resource('rays' , RayController::class);

        // التحاليل
        Route::resource('laboratories' , LaboratoryController::class);
        // الحجوزات
        Route::resource('reservations' , BookListController::class)->only(['index']);

        Route::resource('reviews' , DoctorReviewController::class)->only(['index']);

        Route::resource('doctor-profile' , ProfileController::class)->only(['edit','update']);



    });
    require __DIR__.'/auth.php';
});


