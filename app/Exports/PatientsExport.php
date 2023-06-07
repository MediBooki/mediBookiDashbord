<?php

namespace App\Exports;

use App\Models\Patient;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patient::orderBy('id','DESC')->get();
    }
}
