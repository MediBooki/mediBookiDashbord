<?php

namespace App\Repository\Payments;

use App\Interfaces\Payments\PaymentRepositoryInterface;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;


class PaymentRepository implements PaymentRepositoryInterface
{
    public function index()
    {
        $payments = Payment::orderBy('id','DESC')->paginate(15);
        return view('dashboard.payments.index', compact('payments'));
    }
    public function create()
    {
        $patients = Patient::orderBy('id','DESC')->get();
        return view('dashboard.payments.create', compact('patients'));
    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('dashboard.payments.show', compact('payment'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        // حفظ في جدول سندات القبض
        $payment = new Payment();
        $payment->date = date('Y-m-d');
        $payment->patient_id = $request->patient_id;
        $payment->credit = $request->credit;
        $payment->description = $request->description;
        $payment->save();
        // حفظ في جدول الصندوق
        $fund_account = new FundAccount();
        $fund_account->date = date('Y-m-d');
        $fund_account->payment_id = $payment->id;
        $fund_account->credit = $request->credit;
        $fund_account->debit = 0.00;
        $fund_account->save();
        // حفظ في جدول حساب المريض
        $patient_account = new PatientAccount();
        $patient_account->date = date('Y-m-d');
        $patient_account->patient_id = $request->patient_id;
        $patient_account->payment_id = $payment->id;
        $patient_account->credit = 0.00;
        $patient_account->debit = $request->credit; 
        $patient_account->save();
        DB::commit();
        return redirect()->route('payments.index')->with(['success' => 'Payment Added Successfully']);
    }
    public function edit($id) {
        $payment = Payment::findOrFail($id);
        $patients = Patient::orderBy('id','DESC')->get();
        return view('dashboard.payments.edit', compact('patients','payment'));
    }
    public function update($request)
    {
        DB::beginTransaction();
        // حفظ في جدول سندات القبض
        $payment = Payment::findOrFail($request->id);
        $payment->date = date('Y-m-d');
        $payment->patient_id = $request->patient_id;
        $payment->credit = $request->credit;
        $payment->description = $request->description;
        $payment->save();
        // حفظ في جدول الصندوق
        $fund_account = FundAccount::where('payment_id',$request->id)->first();
        $fund_account->date = date('Y-m-d');
        $fund_account->payment_id = $payment->id;
        $fund_account->credit = $request->credit;
        $fund_account->debit = 0.00;
        $fund_account->save();
        // حفظ في جدول حساب المريض
        $patient_account = PatientAccount::where('payment_id',$request->id)->first();
        $patient_account->date = date('Y-m-d');
        $patient_account->patient_id = $request->patient_id;
        $patient_account->payment_id = $payment->id;
        $patient_account->credit = 0.00;
        $patient_account->debit = $request->credit; 
        $patient_account->save();
        DB::commit();
        return redirect()->route('payments.index')->with(['success' => 'Payment Updated Successfully']);
    }
    public function destroy($request)
    {
        $patient_account = Payment::findOrFail($request->id);
        $patient_account->delete();
        return redirect()->route('payments.index')->with(['success' => 'Payment Deleted Successfully']);
    }
}