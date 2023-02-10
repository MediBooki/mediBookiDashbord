<?php

use App\Http\Controllers\API\Auth\PatientAuthController;
use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\WishlistMedicineController;
use App\Http\Controllers\API\BookDoctorController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['changeLanguage']], function (){
    Route::resource('doctors', DoctorController::class)->except(['edit','create']);
    Route::resource('medicines', MedicineController::class)->only(['index','show']);
    Route::apiResource('categories', SectionController::class)->only(['index','show']);
    Route::resource('services', ServiceController::class)->only(['index','show']);
    Route::get('/filter/doctors',[DoctorController::class,'filter']);
    Route::group(['prefix' => 'patient'], function () {
        Route::post('login', [PatientAuthController::class,'login']);
        Route::post('register', [PatientAuthController::class,'register']);
        Route::middleware(['auth:patient'])->group(function(){
            Route::apiResource('wishlist/medicine', WishlistMedicineController::class)->only(['index','store','destroy']);
            Route::apiResource('insurance', PatientController::class)->only(['store','index']);
            Route::apiResource('book/doctor', BookDoctorController::class)->only(['store','index']);
            // Route::get('cart/{id}', [OrderController::class, 'addToCart']);
            Route::apiResource('orders', OrderController::class);
            Route::apiResource('payments', PaymentController::class);
            Route::get('/payments/verify/{payment?}',[PaymentController::class,'payment_verify']);
            Route::get('/callback',[PaymentController::class,'callback']);

        });    
    });
});

