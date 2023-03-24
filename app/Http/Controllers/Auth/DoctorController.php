<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorLoginRequest;
use App\Models\Doctor;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function store(DoctorLoginRequest $request)
    {
        $checkStatus = Doctor::where('email',$request->input('email'))->where('status',1)->count();
        if($request->authenticate() && $checkStatus ==1)
        {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::DOCTOR);
        }
        return redirect()->back()->with(['Error' => 'Something is Failed please try again']);
    }

    public function destroy(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('dashboard.auth.login');
    }
}
