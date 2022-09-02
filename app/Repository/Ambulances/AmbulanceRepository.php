<?php

namespace App\Repository\Ambulances;

use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    public function index()
    {
        $ambulances = Ambulance::orderBy('id','DESC')->paginate(15);
        return view('dashboard.ambulances.index', compact('ambulances'));
    }
    public function create()
    {

        return view('dashboard.ambulances.create');
    }

    public function store($request)
    {
        $ambulance = new Ambulance();
        $ambulance->driver_name = ['en' => $request->driver_name_en, 'ar' => $request->driver_name];
        $ambulance->car_number = $request->car_number;
        $ambulance->car_model = $request->car_model;
        $ambulance->car_year_made =  $request->car_year_made;
        $ambulance->driver_license_number =  $request->driver_license_number;
        $ambulance->driver_phone =  $request->driver_phone;
        $ambulance->is_available =  1;
        $ambulance->save();
        return redirect()->route('ambulances.index')->with(['success' => 'Ambulance Added Successfully']);
    }
    public function edit($id) 
    {
        $ambulance = Ambulance::findOrFail($id);
        return view('dashboard.ambulances.edit',compact('ambulance'));
    }
    public function update($request)
    {
        $ambulance = Ambulance::findOrFail($request->id);
        $ambulance->driver_name = ['en' => $request->driver_name_en, 'ar' => $request->driver_name];        $ambulance->car_number = $request->car_number;
        $ambulance->car_model = $request->car_model;
        $ambulance->car_year_made =  $request->car_year_made;
        $ambulance->driver_license_number =  $request->driver_license_number;
        $ambulance->driver_phone =  $request->driver_phone;
        $ambulance->is_available =  $request->is_available;
        $ambulance->save();
        return redirect()->route('ambulances.index')->with(['success' => 'Ambulance Updated Successfully']);
    }
    public function destroy($request)
    {  
        $ambulance = ambulance::findOrFail($request->id);
        $ambulance->delete(); 
        return redirect()->route('ambulances.index')->with(['success' => 'Ambulances Deleted Successfully']);
    }
}