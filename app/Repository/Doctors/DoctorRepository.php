<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Service;
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
        try {
            DB::beginTransaction();
            $doctor = new Doctor();
            $doctor->name = ['en' => $request->name_en, 'ar' => $request->name];
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->password = Hash::make($request->password);
            $doctor->section_id =  $request->section_id;
            $doctor->start = $request->start;
            $doctor->end = $request->end;
            $doctor->patient_time_minute = $request->patient_time_minute;
            $doctor->save();
            $doctor->appointments()->attach($request->appointments);
            if($request->hasFile('photo') && $request->file('photo')->isValid()){
                $doctor->addMediaFromRequest('photo')->toMediaCollection('photo');
            }
            $service = new Service();
            $service->name = ['en' => 'Reservation', 'ar' => 'كشف عادي '];
            $service->description = ['en' => 'Reservation', 'ar' => 'كشف عادي '];
            $service->price = $request->price;
            $service->doctor_id = $doctor->id;
            $service->status = 1;
            $service->save();
            DB::commit();
            return redirect()->route('doctors.index')->with(['success' => 'Doctor Added Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

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