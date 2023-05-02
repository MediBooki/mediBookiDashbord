<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Insurance;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected $patient;
    public function __construct(PatientRepositoryInterface $patient)
    {
        $this->patient = $patient;
    }

    public function index()
    {
        return $this->patient->index();
    }
    public function create()
    {
        return $this->patient->create();
    }
    public function show($id)
    {
        return $this->patient->show($id);
    }
    public function store(PatientRequest $request)
    {
        return $this->patient->store($request);
    }
    public function edit($id)
    {
        return $this->patient->edit($id);
    }
    public function update(PatientRequest $request)
    {
        return $this->patient->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->patient->destroy($request);
    }
    public function getInsurance($id)
    {
        $insurance = Patient::where('id', $id)->select('insurance_id')->first();
        $comp_insurance = Insurance::where([
            ['id', $insurance->insurance_id],
            ['insurance_status',1]
            ])->first();
        return $comp_insurance;
    }
}
