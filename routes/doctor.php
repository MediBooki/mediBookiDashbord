<?php

use App\Http\Controllers\doctorDashboard\InvoiceController;
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
        
        Route::get('dashboard/doctor', function () {
            return view('dashboard.doctorDashboard.dashboard');
        })->name('dashboard.doctor');

        Route::get('invoices',[InvoiceController::class,'index'])->name('doctor.invoices');

    });

  

    require __DIR__.'/auth.php';
});


