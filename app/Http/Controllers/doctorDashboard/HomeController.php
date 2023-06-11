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
        $rating = DoctorReview::where('doctor_id',Auth::user()->id)->orderBy('id','DESC')->with(['patient'])->take(10)->get();
          $bestServices = Service::selectRaw('services.*, COUNT(invoices.id) AS booking_count')
            ->join('invoices', 'invoices.service_id', '=', 'services.id')
            ->where('invoices.doctor_id', Auth::user()->id)
            ->groupBy('services.id')
            ->orderByDesc('booking_count')
            ->take(5)
            ->get();
        return view('dashboard.doctorDashboard.dashboard',compact('rating','bestServices'));
    }
}