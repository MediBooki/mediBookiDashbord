<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\RayRequest;
use App\Interfaces\doctorDashboard\RayRepositoryInterface;
use Illuminate\Http\Request;

class RayController extends Controller
{
    protected $ray;
    public function __construct(RayRepositoryInterface $ray)
    {
        $this->ray = $ray;
    }
    public function store(RayRequest $request)
    {
        return $this->ray->store($request);
    }

    public function show($id)
    {
        return $this->ray->show($id);
    }
    public function update(RayRequest $request)
    {
        return $this->ray->update($request);
    }

    public function destroy($request)
    {
        return $this->ray->destroy($request);
    }
}
