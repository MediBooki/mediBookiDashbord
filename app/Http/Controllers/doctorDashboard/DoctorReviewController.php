<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Models\DoctorReview;
use Illuminate\Http\Request;

class DoctorReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = DoctorReview::where('doctor_id', auth()->user()->id)->with(['patient'])->orderBy('id','DESC')->paginate(15);
        return view('dashboard.doctorDashboard.reviews.index', compact('reviews'));
    }
}
