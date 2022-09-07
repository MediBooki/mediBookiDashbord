<?php

namespace App\Interfaces\Labs;

interface LabInfoRepositoryInterface
{
    public function index();
    public function full_index();
    public function update($request);
    
}