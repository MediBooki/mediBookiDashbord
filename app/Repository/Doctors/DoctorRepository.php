<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function index()
    {
        $doctors = Doctor::orderBy('id','DESC')->paginate(15);
        return view('dashboard.doctors.index', compact('doctors'));
    }
    public function create()
    {
        $sections = Section::orderBy('id','DESC')->get();
        $appointments = Appointment::orderBy('id','DESC')->get();
        return view('dashboard.doctors.create', compact('sections','appointments'));
    }

    public function store($request)
    {
        $doctor = new Doctor();
        $doctor->name = ['en' => $request->name_en, 'ar' => $request->name];
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);
        $doctor->section_id =  $request->section_id;
        // $doctor->appointments =  implode(',', $request->appointments);
        $doctor->save();
        $doctor->appointments()->attach($request->appointments);
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $doctor->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('doctors.index')->with(['success' => 'Doctor Added Successfully']);
    }
    public function update($request)
    {
        $doctor = Doctor::findOrFail($request->id);
        $doctor->status = $request->status;
        $doctor->save();
        return redirect()->route('doctors.index')->with(['success' => 'Doctor Updated Successfully']);
    }
    public function destroy($request)
    {
        if($request->delete_select_id){
            $delete_select_id = explode(',', $request->delete_select_id);
            foreach ($delete_select_id as $ids_doctors){
                $section = Doctor::findOrFail($ids_doctors);
                $section->delete();
                $section->clearMediaCollection('photo');
            }
        } else{
            $section = Doctor::findOrFail($request->id);
            $section->delete();
            $section->clearMediaCollection('photo');
        }
      
        return redirect()->route('doctors.index')->with(['success' => 'section Deleted Successfully']);
    }
}