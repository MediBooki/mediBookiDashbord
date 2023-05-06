<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SliderResource;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Slider;
use App\Traits\ResponseAPI;

class SettingController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $setting = Setting::get();
        return $this->sendResponse(SettingResource::collection($setting), 'Setting send successfully');
    }
    public function getSlider()
    {
        $sliders = Slider::get();
        return $this->sendResponse(SliderResource::collection($sliders), 'Setting send successfully');
    }
    public function getCount()
    {
        $date = [];

        $date['patients'] = Patient::count();
        $date['doctors'] = Doctor::where('status',1)->count();
        $date['sections'] = Section::count();
        $date['medicine'] = Medicine::where('status',1)->count();

        return response()->json($date);
    }
}
