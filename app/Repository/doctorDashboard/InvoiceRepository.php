<?php

namespace App\Repository\doctorDashboard;

use App\Interfaces\doctorDashboard\InvoiceRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id',Auth::user()->id)->orderBy('id','DESC')->paginate(15);
        return view('dashboard.doctorDashboard.invoices.index', compact('invoices'));
    }
}