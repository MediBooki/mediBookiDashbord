<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use App\Traits\ResponseAPI;

class SettingController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $setting = Setting::get();
        return $this->sendResponse(SettingResource::collection($setting), 'Setting send successfully');
    }
}
