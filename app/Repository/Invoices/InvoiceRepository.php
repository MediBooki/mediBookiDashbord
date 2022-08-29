<?php

namespace App\Repository\Invoices;

use App\Interfaces\Invoices\InvoiceRepositoryInterface;
use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Service;
use DB;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::orderBy('id','DESC')->paginate(15);
        return view('dashboard.invoices.index', compact('invoices'));
    }
    public function create()
    {
        $patients = Patient::orderBy('id','DESC')->get();
        $doctors = Doctor::orderBy('id','DESC')->get();
        $services = Service::orderBy('id','DESC')->get();
        return view('dashboard.invoices.create',compact('patients', 'doctors','services'));
    }

    public function store($request)
    {
        DB::beginTransaction();
         // حفظ في جدول الفواتير
        $invoice = new Invoice();
        $invoice->patient_id = $request->patient_id;
        $invoice->doctor_id = $request->doctor_id;
        $invoice->section_id = $request->section_id;
        $invoice->type =  $request->type;
        $invoice->service_id =  $request->service_id;
        $invoice->price =  $request->price;
        $invoice->discount_value =  $request->discount_value;
        $invoice->tax_rate =  $request->tax_rate;
        $invoice->tax_value =  $request->tax_value;
        $invoice->total_with_tax =  $request->total_with_tax;
        $invoice->invoice_date =  date('Y-m-d');
        $invoice->save();
        // فاتورة نقدي
        if($request->type == 1)
        {
            // حفظ في جدول الصندوق
            $fund_account = new FundAccount();
            $fund_account->date =  date('Y-m-d');
            $fund_account->invoice_id = $invoice->id;
            $fund_account->debit = $invoice->total_with_tax;
            $fund_account->credit = 0.00;
            $fund_account->save();
        } 
        // فاتورة اجل
        else {
            // حفظ في جدول حسابات المريض
            $patient_account = new PatientAccount();
            $patient_account->date =  date('Y-m-d');
            $patient_account->invoice_id = $invoice->id;
            $patient_account->patient_id = $invoice->patient_id;
            $patient_account->debit = $invoice->total_with_tax;
            $patient_account->credit = 0.00;
            $patient_account->save();

        }
        DB::commit();
        return redirect()->route('invoices.index')->with(['success' => 'Invoice Added Successfully']);
    }
    public function edit($id) 
    {
        $invoice = Invoice::findOrFail($id);
        $patients = Patient::orderBy('id','DESC')->get();
        $doctors = Doctor::orderBy('id','DESC')->get();
        $services = Service::orderBy('id','DESC')->get();
        return view('dashboard.invoices.edit',compact('invoice','doctors','services','patients'));
    }
    public function update($request)
    {
        DB::beginTransaction();
        $invoice = Invoice::findOrFail($request->id);
        $invoice->patient_id = $request->patient_id;
        $invoice->doctor_id = $request->doctor_id;
        $invoice->section_id = $request->section_id;
        $invoice->type =  $request->type;
        $invoice->service_id =  $request->service_id;
        $invoice->price =  $request->price;
        $invoice->discount_value =  $request->discount_value;
        $invoice->tax_rate =  $request->tax_rate;
        $invoice->tax_value =  $request->tax_value;
        $invoice->total_with_tax =  $request->total_with_tax;
        $invoice->invoice_date =  date('Y-m-d');
        $invoice->save();
        if($request->type == 1)
        {
            // حفظ في جدول الصندوق
            $fund_account = FundAccount::where('invoice_id',$request->id)->first();
            $fund_account->date =  date('Y-m-d');
            $fund_account->invoice_id = $invoice->id;
            $fund_account->debit = $invoice->total_with_tax;
            $fund_account->credit = 0.00;
            $fund_account->save();
        } 
        // فاتورة اجل
        else {
            // حفظ في جدول حسابات المريض
            $patient_account = PatientAccount::where('invoice_id',$request->id)->first();
            $patient_account->date =  date('Y-m-d');
            $patient_account->invoice_id = $invoice->id;
            $patient_account->patient_id = $invoice->patient_id;
            $patient_account->debit = $invoice->total_with_tax;
            $patient_account->credit = 0.00;
            $patient_account->save();

        }
        DB::commit();
        return redirect()->route('invoices.index')->with(['success' => 'Invoice Updated Successfully']);
    }
    public function destroy($request)
    {  
        $invoice = Invoice::findOrFail($request->id);
        $invoice->delete(); 
        return redirect()->route('invoices.index')->with(['success' => 'invoice Deleted Successfully']);
    }
}