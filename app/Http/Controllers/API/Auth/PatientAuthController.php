<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    use ResponseAPI;
    public function login(Request $request)
    {
        
        $admin = Patient::where('email', $request->input("email"))
        ->first();
        

        if($admin && Hash::check($request->input('password'), $admin->password))
        {
            // $admin = Auth::user();
            $success['token'] = $admin->createToken('mohamed')->accessToken;
            $success['name'] = $admin->name;
            return $this->sendResponse($success ,'Patient login successfully' );
        }
        else{
            return $this->sendError('Please check your Auth' ,['error'=> 'Unauthorised'] );
        }
    }
    public function register(Request $request)
    {
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->password = Hash::make($request->password);
        $patient->date_of_birth =  $request->date_of_birth;
        $patient->phone =  $request->phone;
        $patient->gender =  $request->gender;
        $patient->blood_group = $request->blood_group;
        $patient->address = $request->address;
        $patient->save();
        return $this->sendResponse(new PatientResource($patient) ,'patient Added Successfully' );
    }
}