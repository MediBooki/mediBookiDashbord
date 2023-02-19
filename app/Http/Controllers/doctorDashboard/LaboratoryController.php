<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\LaboratoryRequest;
use App\Interfaces\doctorDashboard\LaboratoryRepositoryInterface;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    protected $laboratory;
    public function __construct(LaboratoryRepositoryInterface $laboratory)
    {
        $this->laboratory = $laboratory;
    }
    public function store(LaboratoryRequest $request)
    {
        return $this->laboratory->store($request);
    }
    public function show($id)
    {
        return $this->laboratory->show($id);
    }

    public function update(LaboratoryRequest $request)
    {
        return $this->laboratory->update($request);
    }

    public function destroy($request)
    {
        return $this->laboratory->destroy($request);
    }
}
