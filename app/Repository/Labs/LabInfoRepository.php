<?php

namespace App\Repository\Labs;

use App\Interfaces\Labs\LabInfoRepositoryInterface;
use App\Models\laboratory;
use App\Models\Ray;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LabInfoRepository implements LabInfoRepositoryInterface
{
    public function index()
    {
        $patient_labs = laboratory::where('case',0)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.labs.index', compact('patient_labs'));
    }
    public function full_index()
    {
        $patient_labs = laboratory::where('case',1)->where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.labs.complete', compact('patient_labs'));
    }
    public function update($request)
    {
        
        $lab = laboratory::findorFail($request->id);
        $lab->description_user = $request->description_user;
        $lab->user_id = Auth::user()->id;
        $lab->case = 1;
        $lab->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $lab->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->back()->with(['success' => 'dissection Updated Successfully']);
    }

}