<?php

namespace App\Exports;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DoctorsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            'Id',
            'Name',
            'Email',
            'Specialization',
            'Phone',
            'Education',
            'Experience'
        ];
    }
    public function collection()
    {
        return collect(Doctor::orderBy('id','DESC')->select('id','name->'.App::getLocale(),'email','specialization','phone','education->'.App::getLocale(),'experience->'.App::getLocale())->get()->toArray());
    }
}
