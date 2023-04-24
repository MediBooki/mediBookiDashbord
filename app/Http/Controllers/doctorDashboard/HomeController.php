<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\doctorDashboard\InvoiceRepositoryInterface;
use App\Models\Doctor;
use App\Models\DoctorReview;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $rating = DoctorReview::where('doctor_id',Auth::user()->id)->orderBy('id','DESC')->with(['patient'])->limit(10)->get();
        return view('dashboard.doctorDashboard.dashboard',compact('rating'));
    }
}