<?php

use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookListController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabInfoController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RayInfoController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
    
    Route::get('/', function (Request $request) {
        return view('dashboard.auth.login');
    });

    Route::middleware('auth')->group(function () {
        Route::resource('tenants' , TenantController::class);

        Route::get('/dashboard/admin',[HomeController::class,'index'])->name('dashboard');
        
        // الصلاحيات للمستخدمين
        Route::resource('roles', RoleController::class)->except(['show'])->middleware('can:users');
        Route::resource('users', UserController::class)->except(['show'])->middleware('can:users');

        Route::resource('sections' , SectionController::class)->except(['edit','create'])->middleware('can:sections');
        Route::resource('doctors' , DoctorController::class)->middleware('can:doctors');
        Route::resource('insurances' , InsuranceController::class)->except(['create','show'])->middleware('can:insurances');
        Route::resource('ambulances' , AmbulanceController::class);
        Route::resource('patients' , PatientController::class)->middleware('can:patients');
        Route::resource('terms' , TermController::class)->except(['edit','create'])->middleware('can:terms');
        Route::resource('blogs' , BlogController::class)->except(['edit','create','show']);
        Route::resource('terms' , TermController::class)->except(['edit','create','show']);

        Route::get('/doctor/services', [ServiceController::class,'index'])->name('services.doctors')->middleware('can:services');

        Route::get('/invoices/patient/insurance/{id}', [PatientController::class,'getInsurance']);

        /* crud  الفواتير 8*/
        Route::resource('invoices' , InvoiceController::class)->middleware('can:invoices');
        Route::get('/invoices/services/doctors/{id}', [InvoiceController::class,'getService']);
        Route::get('/invoices/service/price/{id}', [InvoiceController::class,'getPrice']);
        // Edit
        Route::get('/invoices/{invo_id}/services/doctors/{id}', [InvoiceController::class,'getServiceEdit']);
        Route::get('/invoices/{invo_id}/service/price/{id}', [InvoiceController::class,'getPriceEdit']);

        /*-------------End--------------------------- */
        /* السندات القبض والصرف */
        Route::resource('receipts' , ReceiptController::class)->middleware('can:accounts');
        Route::resource('payments' , PaymentController::class)->middleware('can:accounts');
         /*-------------End--------------------------- */
        /** قسم الاشعة والتحاليل */
        Route::resource('rayInfo' , RayInfoController::class)->middleware('can:x-ray');
        Route::get('/Rays/complete', [RayInfoController::class,'full_index'])->name('rayInfo.complete')->middleware('can:x-ray');

        Route::resource('labInfo' , LabInfoController::class)->middleware('can:laboratory');
        Route::get('/lab/complete', [LabInfoController::class,'full_index'])->name('labInfo.complete')->middleware('can:laboratory');
        /*-------------End--------------------------- */
        /** قسم الصيدلية*/
        Route::resource('medicines' , MedicineController::class)->middleware('can:medicine');
        Route::resource('categories' , CategoryController::class)->except(['edit','create'])->middleware('can:medicine');

        /*-------------End--------------------------- */
        /** قسم الكشوفات*/
        Route::resource('bookLists' , BookListController::class)->except(['edit','show'])->middleware('can:bookLists');
        /*-------------End--------------------------- */
        Route::resource('Dash_orders' , OrderController::class);
        Route::get('order_preparation',[OrderController::class, 'order_preparation'])->name('preparation');
        Route::get('order_undelivered',[OrderController::class, 'order_undelivered'])->name('undelivered');
        Route::get('order_delivered',[OrderController::class, 'order_delivered'])->name('delivered');


        Route::resource('settings' , SettingController::class)->only(['edit','update']);
        Route::resource('sliders' , SliderController::class);

        Route::resource('profile' , ProfileController::class)->only(['edit','update']);

    });

    
    require __DIR__.'/auth.php';
});


