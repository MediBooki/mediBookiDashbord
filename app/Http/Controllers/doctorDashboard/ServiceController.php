<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\ServiceRequest;
use App\Interfaces\doctorDashboard\Services\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(ServiceRepositoryInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }
    public function store(ServiceRequest $request)
    {
        return $this->service->store($request);
    }
    public function update(ServiceRequest $request)
    {
        return $this->service->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->service->destroy($request);
    }
}
