<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SliderResource;
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
}
