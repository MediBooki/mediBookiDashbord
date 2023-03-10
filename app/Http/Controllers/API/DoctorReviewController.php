<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorReviewRequest;
use App\Http\Resources\DoctorReviewResource;
use App\Models\DoctorReview;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class DoctorReviewController extends Controller
{
    use ResponseAPI;

    public function index()
    {
        $rating = DoctorReview::where('patient_id', auth()->user()->id)->orderBy('id','DESC')->with(['doctor'])->paginate(10);
        return $this->sendResponse(DoctorReviewResource::collection($rating), 'Doctor Review lists send successfully',$rating->total());
    }

  
    public function store(DoctorReviewRequest $request)
    {
        $rating_c = DoctorReview::where('patient_id', auth()->user()->id)->where('doctor_id', $request->doctor_id)->count();
        if ($rating_c > 0 || $request->id) {
            $rating = DoctorReview::findOrFail($request->id);
            $rating->patient_id = auth()->user()->id;
            $rating->doctor_id = $request->doctor_id;
            $rating->comment = $request->comment;
            $rating->rating = $request->rating;
            $rating->save();
            $message = "Doctor Review Updated successfully";
        } else {
            $rating = new DoctorReview();
            $rating->patient_id = auth()->user()->id;
            $rating->doctor_id = $request->doctor_id;
            $rating->comment = $request->comment;
            $rating->rating = $request->rating;
            $rating->save();
            $message = "Doctor Review send successfully";
        }
        return $this->sendResponse(new DoctorReviewResource($rating), $message);
    }
}
