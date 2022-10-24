<?php

use App\Http\Controllers\API\Auth\PatientAuthController;
use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\SectionController;
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
    Route::resource('doctors' , DoctorController::class)->except(['edit','create','show']);
    Route::resource('sections' , SectionController::class)->except(['edit','create','show']);
});
Route::group(['prefix' => 'patient'],function (){
    Route::post('login',[PatientAuthController::class,'login']);
    Route::post('register',[PatientAuthController::class,'register']);
   
});
