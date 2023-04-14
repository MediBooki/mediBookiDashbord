<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\SectionResource;
use App\Models\Invoice;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $invoices = Invoice::where([
            ['patient_id', '=', auth()->user()->id]
            ])->orderBy('id','DESC')->get();
        return $this->sendResponse(InvoiceResource::collection($invoices), 'Invoice lists send successfully');
    }
}
