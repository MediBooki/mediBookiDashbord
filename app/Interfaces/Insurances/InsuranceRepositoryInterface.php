<?php

namespace App\Interfaces\Insurances;

interface InsuranceRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}