<?php

namespace App\Interfaces\doctorDashboard;

interface LaboratoryRepositoryInterface
{
    public function store($request);
    public function update($request);
    public function destroy($request);
}