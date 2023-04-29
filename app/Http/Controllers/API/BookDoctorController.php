<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookDoctorResource;
use App\Models\BookDoctor;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookDoctorController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $bookDoctorList = BookDoctor::patientAuth()->orderBy('id','DESC')->get();
        return $this->sendResponse(BookDoctorResource::collection($bookDoctorList), 'books lists send successfully');
    }

    public function store(Request $request)
    {
        $bookDoctorList = BookDoctor::patientAuth()->where('date', Carbon::now('Africa/Cairo')->format('Y-m-d'))->get();
        if($bookDoctorList->count() == 0){
            $bookDoctor = new BookDoctor();
            $bookDoctor->patient_id = $request->patient_id;
            $bookDoctor->doctor_id  = $request->doctor_id;
            $bookDoctor->price      = $request->price;
            $bookDoctor->date       = $request->date;
            $bookDoctor->time       = $request->time;
            $bookDoctor->save();
            return $this->sendResponse(new BookDoctorResource($bookDoctor) ,'reservation Saved successfully');
        }
        return $this->sendResponse(BookDoctorResource::collection($bookDoctorList) ,'reservation today no finished');
    }
    public function showBookDoctorList(Request $request)
    {
        $bookDoctorList = BookDoctor::where([
            ['doctor_id',$request->doctor_id],
            ['date',$request->date]
        ])->orderBy('id','DESC')->get();
        return $this->sendResponse(BookDoctorResource::collection($bookDoctorList), 'books lists send successfully');
    } 
}
