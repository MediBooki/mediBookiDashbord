<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function edit($id) 
    {
        $setting = Setting::findorFail($id);
        return view('dashboard.setting.edit', compact('setting'));
    }
    public function update(SettingRequest $request,$id) 
    {
        try {
            $setting = Setting::findorFail($request->id);
            $setting->update($request->all());
            return redirect()->back()->with((['success'=> 'Your setting updated successfully']));
        } catch (\Exception $ex){
            DB::rollback();
            return redirect()->back()->with((['error'=> 'Something is wrong']));
        }
    }
}
