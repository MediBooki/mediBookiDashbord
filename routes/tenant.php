<?php

use App\Http\Controllers\TenantController;
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
        // if(request()->getHost() == "medibookidashbord.test")
        // {
        //     Route::resource('tenants' , TenantController::class);
        // }

    });

});