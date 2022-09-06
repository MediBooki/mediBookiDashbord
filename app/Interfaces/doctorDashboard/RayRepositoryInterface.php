<?php

namespace App\Interfaces\doctorDashboard;

interface RayRepositoryInterface
{
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function show($id);
}