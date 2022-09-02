<?php

namespace App\Repository\doctorDashboard;

use App\Interfaces\doctorDashboard\LaboratoryRepositoryInterface;
use App\Models\Laboratory;
use Illuminate\Support\Facades\DB;

class LaboratoryRepository implements LaboratoryRepositoryInterface
{
    public function store($request)
    {
        DB::beginTransaction();
        $laboratory = new Laboratory();
        $laboratory->description = $request->description;
        $laboratory->invoice_id=$request->invoice_id;
        $laboratory->patient_id=$request->patient_id;
        $laboratory->doctor_id=$request->doctor_id;
        $laboratory->save();
        DB::commit();
        return redirect()->route('doctor.invoices')->with(['success' => 'Laboratory Added Successfully']);
    }
    public function update($request)
    {
        $laboratory = Laboratory::findorFail($request->id);
        $laboratory->description = $request->description;
        $laboratory->invoice_id=$request->invoice_id;
        $laboratory->patient_id=$request->patient_id;
        $laboratory->doctor_id=$request->doctor_id;
        $laboratory->save();
        return redirect()->back()->with(['success' => 'Laboratory Updated Successfully']);
    }
    public function destroy($id)
    {
        
        $laboratory = Laboratory::findOrFail($id);
        $laboratory->delete(); 
        return redirect()->back()->with(['success' => 'Laboratory Deleted Successfully']);
    }
}