<?php

namespace App\Exports;

use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class InvoicesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            'Id',
            'Service Name',
            'patient name',
            'Invoice Date',
            'Doctor Name',
            'Service Price',
            'Invoice Discount Value',
            'Invoice Tax Rate',
            'Invoice Tax Value',
            'Invoice Total With Tax',
        ];
    }
    public function collection()
    {
        return collect(Invoice::orderBy('id', 'DESC')
        ->join('services', 'services.id', '=', 'invoices.service_id')
        ->join('patients', 'patients.id', '=', 'invoices.patient_id')
        ->join('doctors', 'doctors.id', '=', 'invoices.doctor_id')
        ->select('invoices.id', 'services.name->'.App::getLocale(), 'patients.name', 'invoices.invoice_date', 'doctors.name->'.App::getLocale(), 'services.price', 'invoices.discount_value', 'invoices.tax_rate', 'invoices.tax_value', 'invoices.total_with_tax')
        ->get()
        ->toArray());
    }
}

