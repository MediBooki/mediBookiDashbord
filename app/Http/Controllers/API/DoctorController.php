<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $doctors = Doctor::orderBy('id','DESC')->with(['section','appointments'])->paginate(10);
        return $this->sendResponse(DoctorResource::collection($doctors), 'Doctor lists send successfully',$doctors->total());
    }
   
    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->name = ['en' => $request->name_en, 'ar' => $request->name];
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);
        $doctor->section_id =  $request->section_id;
        $doctor->save();
        // $doctor->appointments()->attach($request->appointments);
        if ($request->hasFile('photo') && $request->file('photo')->isValid())
        {
            $doctor->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return $this->sendResponse(new DoctorResource($doctor) ,'Doctor Saved successfully');
    }
    public function show($id)
    {
        $doctor = Doctor::with(['section','appointments'])->findOrFail($id);
        // dd($doctor);
        return $this->sendResponse(new DoctorResource($doctor) ,'Doctor finded successfully');
    }
    public function filter(Request $request)
    {
        $doctors = Doctor::Filter()->paginate(10);
        return $this->sendResponse(DoctorResource::collection($doctors), 'Doctor lists send successfully');
    }


}
