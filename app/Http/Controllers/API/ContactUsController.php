<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Models\Setting;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $setting = Setting::first();
        $adminEmail = $setting->gmail;
        Mail::to($adminEmail)->send(new ContactMail($request));
        return response()->json("Thank you for contact us. we will contact you shortly.");
    }
}
