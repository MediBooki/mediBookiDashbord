<?php

namespace App\Repository\doctorDashboard;

use App\Interfaces\doctorDashboard\RayRepositoryInterface;
use App\Models\Ray;
use Illuminate\Support\Facades\DB;

class RayRepository implements RayRepositoryInterface
{
    public function store($request)
    {
        DB::beginTransaction();
        $xray = new Ray();
        $xray->description = $request->description;
        $xray->invoice_id=$request->invoice_id;
        $xray->patient_id=$request->patient_id;
        $xray->doctor_id=$request->doctor_id;
        $xray->save();
        DB::commit();
        return redirect()->route('doctor.invoices')->with(['success' => 'X-Ray Added Successfully']);
    }
    public function update($request)
    {
        $xray = Ray::findorFail($request->id);
        $xray->description = $request->description;
        $xray->invoice_id=$request->invoice_id;
        $xray->patient_id=$request->patient_id;
        $xray->doctor_id=$request->doctor_id;
        $xray->save();
        return redirect()->back()->with(['success' => 'X-Ray Updated Successfully']);
    }
    public function destroy($request)
    {
        $xray = Ray::findOrFail($request->id);
        $xray->delete(); 
        return redirect()->back()->with(['success' => 'xray Deleted Successfully']);
    }
}