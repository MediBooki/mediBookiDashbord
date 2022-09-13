<?php

namespace App\Repository\doctorDashboard\Services;

use App\Interfaces\doctorDashboard\Services\ServiceRepositoryInterface;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index()
    {
        $services = Service::where('doctor_id',Auth::user()->id)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.services.single.index', compact('services'));
    }
   

    public function store($request)
    {
        $service = new Service();
        $service->name = ['en' => $request->name_en, 'ar' => $request->name];
        $service->description = ['en' => $request->description_en, 'ar' => $request->description];
        $service->price = $request->price;
        $service->doctor_id = Auth::user()->id;
        $service->status = 1; 
        $service->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $service->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('services.index')->with(['success' => 'Service Added Successfully']);
    }
    public function update($request)
    {
        $service = Service::findOrFail($request->id);
        $service->name = ['en' => $request->name_en, 'ar' => $request->name];
        $service->description = ['en' => $request->description_en, 'ar' => $request->description];
        $service->price = $request->price;
        $service->status = $request->status;
        $service->doctor_id = Auth::user()->id;
        $service->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $service->clearMediaCollection('photo');
            $service->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('services.index')->with(['success' => 'Service Updated Successfully']);
    }
    public function destroy($request)
    {
       
        $service = Service::findOrFail($request->id);
        $service->delete();
        $service->clearMediaCollection('photo');
        return redirect()->route('services.index')->with(['success' => 'Service Deleted Successfully']);
    }
}