<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    protected $doctor;
    public function __construct(DoctorRepositoryInterface $doctor)
    {
        $this->doctor = $doctor;
    }

    public function index()
    {
        return $this->doctor->index();
    }
    public function create()
    {
        return $this->doctor->create();
    }
    public function store(DoctorRequest $request)
    {
        dd($request);
        return $this->doctor->store($request);
    }
    public function update(DoctorRequest $request)
    {
        $this->validate($request,[
            'status' => 'required|in:0,1',
        ]);
        return $this->doctor->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->doctor->destroy($request);
    }
}
