<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\doctorDashboard\InvoiceRepositoryInterface;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoice;
    public function __construct(InvoiceRepositoryInterface $invoice)
    {
        $this->invoice = $invoice;
    }
    public function index()
    {
        return $this->invoice->index();
    }
    public function complete()
    {
        return $this->invoice->complete();
    }
    public function review()
    {
        return $this->invoice->review();
    }
}
