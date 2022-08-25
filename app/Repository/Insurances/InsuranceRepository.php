<?php

namespace App\Repository\Insurances;

use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;


class InsuranceRepository implements InsuranceRepositoryInterface
{
    public function index()
    {
        $insurances = Insurance::orderBy('id','DESC')->paginate(15);
        return view('dashboard.insurances.index', compact('insurances'));
    }
    public function store($request)
    {
        $insurance = new Insurance();
        $insurance->name = ['en' => $request->name_en, 'ar' => $request->name];
        $insurance->insurance_code = $request->insurance_code;
        $insurance->discount_percentage = $request->discount_percentage;
        $insurance->company_rate = $request->company_rate;
        $insurance->status = 1;
        $insurance->save();
        return redirect()->route('insurances.index')->with(['success' => 'Insurance Added Successfully']);
    }
    public function update($request)
    {
        $insurance = Insurance::findOrFail($request->id);
        $insurance->name = ['en' => $request->name_en, 'ar' => $request->name];
        $insurance->insurance_code = $request->insurance_code;
        $insurance->discount_percentage = $request->discount_percentage;
        $insurance->company_rate = $request->company_rate;
        $insurance->status = $request->status;
        $insurance->save();
        
        return redirect()->route('insurances.index')->with(['success' => 'Insurance Updated Successfully']);
    }
    public function destroy($request)
    {
        $insurance = Insurance::findOrFail($request->id);
        $insurance->delete();
        return redirect()->route('insurances.index')->with(['success' => 'Insurance Deleted Successfully']);
    }
}