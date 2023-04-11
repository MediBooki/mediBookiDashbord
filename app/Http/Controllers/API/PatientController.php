<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiagnosticResource;
use App\Http\Resources\InsuranceResource;
use App\Http\Resources\PatientResource;
use App\Models\Diagnostic;
use App\Models\Insurance;
use App\Models\Patient;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    use ResponseAPI;

    public function index()
    {
        $insurances = Insurance::orderBy('id','DESC')->get();
        return $this->sendResponse(InsuranceResource::collection($insurances), 'insurance lists send successfully');
    }

    public function store(Request $request)
    {
        $patient = Patient::findOrFail(Auth::guard('patient')->user()->id);
        $patient->insurance_id = $request->insurance_id;
        $patient->insurance_number =  $request->insurance_number;
        // expairy date
        $patient->insurance_date =  $request->insurance_date;
        $patient->insurance_status = 0;
        $patient->save();
        return $this->sendResponse(new PatientResource($patient) ,'insurance under review');
    }
    public function showDiagnostic()
    {
        $diagnostic = Diagnostic::where('patient_id',Auth::guard('patient')->user()->id)->with(['doctor'])->orderBy('id','DESC')->get();
        return $this->sendResponse(DiagnosticResource::collection($diagnostic), 'diagnostic lists send successfully',$diagnostic->count());
    }
    public function getPatientInfo()
    {
        $patient = Patient::where('id',Auth::guard('patient')->user()->id)->first();
        return $this->sendResponse(new PatientResource($patient), 'Patient send successfully');
    }
    public function updatePatientInfo(Request $request)
    {
        $patient = Patient::findOrFail(Auth::guard('patient')->user()->id);
        $patient->name = $request->name;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->save();
        return $this->sendResponse(new PatientResource($patient) ,'Patient Info Updated Successfully');
    }
}
