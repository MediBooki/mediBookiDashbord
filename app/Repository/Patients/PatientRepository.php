<?php

namespace App\Repository\Patients;

use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Payment;
use App\Models\Receipt;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface
{
    public function index()
    {
        $patients = Patient::orderBy('id','DESC')->paginate(15);
        return view('dashboard.patients.index', compact('patients'));
    }
    public function create()
    {
        return view('dashboard.patients.create');
    }
    public function show($id)
    {
        
        $patient = Patient::findOrFail($id);
        $invoices = Invoice::where('patient_id', $id)->get();
        $receipts = Receipt::where('patient_id', $id)->get();
        $payments = Payment::where('patient_id', $id)->get();
        $patient_accounts = PatientAccount::
            where('patient_id', $id)
            ->get();
            
        return view('dashboard.patients.show',compact('patient','invoices','receipts','payments','patient_accounts'));
    }

    public function store($request)
    {
        
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->password = Hash::make($request->password);
        $patient->date_of_birth =  $request->date_of_birth;
        $patient->phone =  $request->phone;
        $patient->gender =  $request->gender;
        $patient->blood_group = $request->blood_group;
        $patient->address = $request->address;
        $patient->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $patient->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('patients.index')->with(['success' => 'patient Added Successfully']);
    }
    public function edit($id) 
    {
        $patient = patient::findOrFail($id);
        return view('dashboard.patients.edit',compact('patient'));
    }
    public function update($request)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->name = $request->name;
        $patient->date_of_birth =  $request->date_of_birth;
        $patient->phone =  $request->phone;
        $patient->blood_group = $request->blood_group;
        $patient->address = $request->address;
        $patient->save();
        return redirect()->route('patients.index')->with(['success' => 'patient Updated Successfully']);
    }
    public function destroy($request)
    {  
        $section = patient::findOrFail($request->id);
        $section->delete(); 
        return redirect()->route('patients.index')->with(['success' => 'patients Deleted Successfully']);
    }
}