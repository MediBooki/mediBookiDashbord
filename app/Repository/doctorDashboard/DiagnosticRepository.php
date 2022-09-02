<?php

namespace App\Repository\doctorDashboard;

use App\Interfaces\doctorDashboard\DiagnosticRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Invoice;
use App\Models\Ray;
use Illuminate\Support\Facades\DB;

class DiagnosticRepository implements DiagnosticRepositoryInterface
{
    public function store($request)
    {
        DB::beginTransaction();
        $diagnosis = new Diagnostic();
        $diagnosis->date = date('Y-m-d');
        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->medicine = $request->medicine;
        $diagnosis->invoice_id=$request->invoice_id;
        $diagnosis->patient_id=$request->patient_id;
        $diagnosis->doctor_id=$request->doctor_id;
        $diagnosis->save();
        $this->update_invoice_status($request->invoice_id,3);
        DB::commit();
        return redirect()->route('doctor.invoices')->with(['success' => 'Diagnosis Added Successfully']);

    }
    public function show($id)
    {
        $patient_records = Diagnostic::where('patient_id', $id)->orderBy('id','DESC')->get();
        $patient_rays = Ray::where('patient_id', $id)->orderBy('id','DESC')->get();
        return view('dashboard.doctorDashboard.patients.show',compact('patient_records','patient_rays'));
    }
    public function addReview($request)
    {
        DB::beginTransaction();
        $diagnosis = new Diagnostic();
        $diagnosis->date = date('Y-m-d');
        $diagnosis->review_date = date('Y-m-d H:i:s');
        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->medicine = $request->medicine;
        $diagnosis->invoice_id=$request->invoice_id;
        $diagnosis->patient_id=$request->patient_id;
        $diagnosis->doctor_id=$request->doctor_id;
        $diagnosis->save();
        $this->update_invoice_status($request->invoice_id,2);
        DB::commit();
        return redirect()->route('doctor.invoices')->with(['success' => 'Diagnosis Added Successfully']);
    }

    public function update_invoice_status($invoice_id,$id_status)
    {
        $status_invoice = Invoice::findorFail($invoice_id);
        $status_invoice->status=$id_status;
        $status_invoice->save();
    }
}