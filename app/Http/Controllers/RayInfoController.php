<?php

namespace App\Http\Controllers;

use App\Interfaces\Rays\RayInfoRepositoryInterface;
use Illuminate\Http\Request;

class RayInfoController extends Controller
{
    protected $ray;
    public function __construct(RayInfoRepositoryInterface $ray)
    {
        $this->ray = $ray;
    }

    public function index()
    {
        return $this->ray->index();
    }

    public function full_index()
    {
        return $this->ray->full_index();
    }

    public function update(Request $request)
    {
        return $this->ray->update($request);
    }
}
