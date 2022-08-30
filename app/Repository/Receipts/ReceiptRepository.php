<?php

namespace App\Repository\Receipts;

use App\Interfaces\Receipts\ReceiptRepositoryInterface;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Receipt;
use Illuminate\Support\Facades\DB;


class ReceiptRepository implements ReceiptRepositoryInterface
{
    public function index()
    {
        $receipts = Receipt::orderBy('id','DESC')->paginate(15);
        return view('dashboard.receipts.index', compact('receipts'));
    }
    public function create()
    {
        $patients = Patient::orderBy('id','DESC')->get();
        return view('dashboard.receipts.create', compact('patients'));
    }

    public function show($id)
    {
        $receipt = Receipt::findOrFail($id);
        return view('dashboard.receipts.show', compact('receipt'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        // حفظ في جدول سندات القبض
        $receipt = new Receipt();
        $receipt->date = date('Y-m-d');
        $receipt->patient_id = $request->patient_id;
        $receipt->debit = $request->debit;
        $receipt->description = $request->description;
        $receipt->save();
        // حفظ في جدول الصندوق
        $fund_account = new FundAccount();
        $fund_account->date = date('Y-m-d');
        $fund_account->receipt_id = $receipt->id;
        $fund_account->debit = $request->debit;
        $fund_account->credit = 0.00;
        $fund_account->save();
        // حفظ في جدول حساب المريض
        $patient_account = new PatientAccount();
        $patient_account->date = date('Y-m-d');
        $patient_account->patient_id = $request->patient_id;
        $patient_account->receipt_id = $receipt->id;
        $patient_account->debit = 0.00;
        $patient_account->credit = $request->debit; 
        $patient_account->save();
        DB::commit();
        return redirect()->route('receipts.index')->with(['success' => 'Receipt Added Successfully']);
    }
    public function edit($id) {
        $receipt = Receipt::findOrFail($id);
        $patients = Patient::orderBy('id','DESC')->get();
        return view('dashboard.receipts.edit', compact('patients','receipt'));
    }
    public function update($request)
    {
        DB::beginTransaction();
        // حفظ في جدول سندات القبض
        $receipt = Receipt::findOrFail($request->id);
        $receipt->date = date('Y-m-d');
        $receipt->patient_id = $request->patient_id;
        $receipt->debit = $request->debit;
        $receipt->description = $request->description;
        $receipt->save();
        // حفظ في جدول الصندوق
        $fund_account = FundAccount::where('receipt_id',$request->id)->first();
        $fund_account->date = date('Y-m-d');
        $fund_account->receipt_id = $receipt->id;
        $fund_account->debit = $request->debit;
        $fund_account->credit = 0.00;
        $fund_account->save();
        // حفظ في جدول حساب المريض
        $patient_account = PatientAccount::where('receipt_id',$request->id)->first();
        $patient_account->date = date('Y-m-d');
        $patient_account->patient_id = $request->patient_id;
        $patient_account->receipt_id = $receipt->id;
        $patient_account->debit = 0.00;
        $patient_account->credit = $request->debit; 
        $patient_account->save();
        DB::commit();
        return redirect()->route('receipts.index')->with(['success' => 'Receipt Updated Successfully']);
    }
    public function destroy($request)
    {
        $patient_account = Receipt::findOrFail($request->id);
        $patient_account->delete();
        return redirect()->route('receipts.index')->with(['success' => 'Receipt Deleted Successfully']);
    }
}