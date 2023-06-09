<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Models\Service;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $doctors = Doctor::where('status',1)->orderBy('id','DESC')->get();
        return $this->sendResponse(DoctorResource::collection($doctors), 'Doctor lists send successfully',$doctors->total());
    }
   
    public function store(DoctorRequest $request)
    {
        try{
            $doctor = new Doctor();
            $doctor->name = ['en' => $request->name_en, 'ar' => $request->name];
            $doctor->education = ['en' => $request->education_en, 'ar' => $request->education];
            $doctor->experience = ['en' => $request->experience_en, 'ar' => $request->experience];
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->password = Hash::make($request->password);
            $doctor->section_id =  $request->section_id;
            $doctor->start = $request->start;
            $doctor->end = $request->end;
            $doctor->patient_time_minute = $request->patient_time_minute;
            $doctor->gender = $request->gender;
            $doctor->title = $request->title;
            $doctor->status = 0;
            $doctor->specialization = $request->specialization;
            $doctor->save();
            $doctor->appointments()->attach($request->appointments);
            
            if($request->hasFile('photo') && $request->file('photo')->isValid()){
                $doctor->addMediaFromRequest('photo')->toMediaCollection('photo');
            }
            $service = new Service();
            $service->name = ['en' => 'Reservation', 'ar' => 'كشف عادي '];
            $service->description = ['en' => 'Reservation', 'ar' => 'كشف عادي '];
            $service->price = $request->price;
            $service->doctor_id = $doctor->id;
            $service->status = 1;
            $service->save();
            return $this->sendResponse(new DoctorResource($doctor) ,'Doctor Saved successfully');
        } catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }
    public function show($id)
    {
        $doctor = Doctor::where('status',1)->with(['section','appointments','reviews'])->findOrFail($id);
        // dd($doctor);
        return $this->sendResponse(new DoctorResource($doctor) ,'Doctor finded successfully');
    }
    public function filter(Request $request)
    {
        $doctors = Doctor::Filter()->where('status',1)->with(['section','appointments','reviews'])->paginate(10);
        return $this->sendResponse(DoctorResource::collection($doctors), 'Doctor lists send successfully',$doctors->total());
    }

    public function bestDoctor()
    {
        $doctors = Doctor::where('status',1)->with(['section','reviews'])->withCount(['reviews as review_rating_avg' => function ($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        },
        'invoices'
        ])
        ->orderByDesc('review_rating_avg')
        ->take(5)
        ->get();
        return $this->sendResponse(DoctorResource::collection($doctors), 'Doctor lists send successfully');

    }

}
