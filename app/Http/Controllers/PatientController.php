<?php

namespace App\Http\Controllers;

use App\Interfaces\Patients\PatientRepositoryInterface;
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
    public function store(Request $request)
    {
        return $this->patient->store($request);
    }
    public function edit($id)
    {
        return $this->patient->edit($id);
    }
    public function update(Request $request)
    {
        return $this->patient->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->patient->destroy($request);
    }
}
