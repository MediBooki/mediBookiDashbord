<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorProfileRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function edit($test) 
    {
        $admin = Doctor::findorFail(auth()->user()->id);
        return view('dashboard.doctorDashboard.profile.edit', compact('admin'));
    }
    public function update(DoctorProfileRequest $request) 
    {
        try {
            $admin = Doctor::findorFail(auth()->user()->id);
            if ($request->filled('password')) 
            {
                $request->merge(['password' => bcrypt($request->password)]);
            } else {
                unset($request['password']);
            }
            unset($request['id']);
            unset($request['password_confirmation']);
            $admin->update($request->all());
            return redirect()->back()->with((['success'=> 'Your profile updated successfully']));
        } catch (\Exception $ex){
            DB::rollback();
            return redirect()->back()->with((['error'=> 'Something is wrong']));
        }
    }
}
