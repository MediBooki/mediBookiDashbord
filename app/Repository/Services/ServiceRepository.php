<?php

namespace App\Repository\Services;

use App\Interfaces\Services\ServiceRepositoryInterface;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index()
    {
        $services = Service::orderBy('id','DESC')->paginate(15);
        return view('dashboard.services.single.index', compact('services'));
    }
   

    public function store($request)
    {
        $service = new Service();
        $service->name = ['en' => $request->name_en, 'ar' => $request->name];
        $service->description = ['en' => $request->description_en, 'ar' => $request->description];
        $service->price = $request->price;
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