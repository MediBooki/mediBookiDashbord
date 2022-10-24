<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $doctors = Doctor::orderBy('id','DESC')->with('section')->get();
        return $this->sendResponse(DoctorResource::collection($doctors), 'Doctor lists send successfully');
    }
   
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }


}
