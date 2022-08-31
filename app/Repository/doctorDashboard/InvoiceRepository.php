<?php

namespace App\Repository\doctorDashboard;

use App\Interfaces\doctorDashboard\InvoiceRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id',Auth::user()->id)->where('status',1)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.doctorDashboard.invoices.index', compact('invoices'));
    }
    public function complete()
    {
        $invoices = Invoice::where('doctor_id',Auth::user()->id)->where('status',3)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.doctorDashboard.invoices.complete', compact('invoices'));
    }
    public function review()
    {
        $invoices = Invoice::where('doctor_id',Auth::user()->id)->where('status',2)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.doctorDashboard.invoices.review', compact('invoices'));
    }
}