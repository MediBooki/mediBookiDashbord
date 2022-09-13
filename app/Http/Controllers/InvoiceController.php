<?php

namespace App\Http\Controllers;

use App\Interfaces\Invoices\InvoiceRepositoryInterface;
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
    public function create()
    {
        return $this->invoice->create();
    }

    public function show($id)
    {
        return $this->invoice->show($id);
    }
    
    public function store(Request $request)
    {
        return $this->invoice->store($request);
    }
    public function edit($id)
    {
        return $this->invoice->edit($id);
    }
    public function update(Request $request)
    {
        return $this->invoice->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->invoice->destroy($request);
    }
    public function getSectionEdit($invo_id =null,$id) 
    {
        $doctor_id = Doctor::with('section')->where('id', $id)->first();
        $section = [];
        $section['section_name'] = $doctor_id->section->name;
        $section['section_id'] = $doctor_id->section->id;
        return $section;
    }
    public function getPriceEdit($invo_id =null,$id) 
    {
        $price = Service::where('id', $id)->select('price')->first();
        return $price;
    }
    public function getService($id) 
    {
        $services = Service::where('doctor_id', $id)->get();
        
        return $services;
    }
    public function getPrice($id) 
    {
        $price = Service::where('id', $id)->select('price')->first();
        return $price;
    }
}
