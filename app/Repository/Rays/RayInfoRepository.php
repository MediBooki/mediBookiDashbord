<?php

namespace App\Repository\Rays;

use App\Interfaces\Rays\RayInfoRepositoryInterface;
use App\Models\Ray;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RayInfoRepository implements RayInfoRepositoryInterface
{
    public function index()
    {
        $patient_rays = Ray::where('case',0)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.rays.index', compact('patient_rays'));
    }
    public function full_index()
    {
        $patient_rays = Ray::where('case',1)->where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.rays.complete', compact('patient_rays'));
    }
    public function update($request)
    {
        $xray = Ray::findorFail($request->id);
        $xray->description_user = $request->description_user;
        $xray->user_id = Auth::user()->id;
        $xray->case = 1;
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $xray->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        if($request->nemo && $request->nemo == 1)
        {
            $response = Http::post('http://127.0.0.1:5000',[
                'url' => $xray->getFirstMediaUrl('photo'),
            ]);
            $prediction = $response->json('The prediction is');
            $xray->prediction = $prediction;
        }
        $xray->save();
        return redirect()->back()->with(['success' => 'X-Ray Updated Successfully']);
    }

}