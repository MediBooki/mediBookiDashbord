<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\SectionResource;
use App\Models\Appointment;
use App\Models\Section;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $appointments = Appointment::orderBy('id','ASC')->get();
        return $this->sendResponse(AppointmentResource::collection($appointments), 'Appointment lists send successfully');
    }
}
