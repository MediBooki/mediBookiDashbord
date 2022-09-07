<?php

use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabInfoController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RayInfoController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', ]
], function(){
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard/admin', function () {
            return view('dashboard.index');
        })->name('dashboard');
        Route::resource('sections' , SectionController::class)->except(['edit','create']);
        Route::resource('doctors' , DoctorController::class);
        Route::resource('services' , ServiceController::class)->except(['edit','create','show']);
        Route::resource('insurances' , InsuranceController::class)->except(['edit','create','show']);
        Route::resource('ambulances' , AmbulanceController::class);
        Route::resource('patients' , PatientController::class);

        /* crud  الفواتير 8*/
        Route::resource('invoices' , InvoiceController::class);
        Route::get('/invoices/sections/doctors/{id}', [InvoiceController::class,'getSection']);
        Route::get('/invoices/service/price/{id}', [InvoiceController::class,'getPrice']);
        // Edit
        Route::get('/invoices/{invo_id}/sections/doctors/{id}', [InvoiceController::class,'getSectionEdit']);
        Route::get('/invoices/{invo_id}/service/price/{id}', [InvoiceController::class,'getPriceEdit']);
        /*-------------End--------------------------- */
        /* السندات القبض والصرف */
        Route::resource('receipts' , ReceiptController::class);
        Route::resource('payments' , PaymentController::class);
         /*-------------End--------------------------- */
        
        Route::resource('rayInfo' , RayInfoController::class);
        Route::get('/Rays/complete', [RayInfoController::class,'full_index'])->name('rayInfo.complete');

        Route::resource('labInfo' , LabInfoController::class);
        Route::get('/lab/complete', [LabInfoController::class,'full_index'])->name('labInfo.complete');
    });

    
    require __DIR__.'/auth.php';
});


