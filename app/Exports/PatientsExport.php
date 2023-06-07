<?php

namespace App\Exports;

use App\Models\Patient;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PatientsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            'Id',
            'Name',
            'Email',
            'Date Of Birth',
            'Phone',
            'gender',
            'Blood Group',
            'Address'
        ];
    }
    public function collection()
    {
        return collect(Patient::orderBy('id','DESC')->select('id','name','email','date_of_birth','phone','gender','blood_group','address')->get()->toArray());
    }
}
