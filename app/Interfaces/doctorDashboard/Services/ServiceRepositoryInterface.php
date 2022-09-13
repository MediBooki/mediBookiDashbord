<?php

namespace App\Interfaces\doctorDashboard\Services;

interface ServiceRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}