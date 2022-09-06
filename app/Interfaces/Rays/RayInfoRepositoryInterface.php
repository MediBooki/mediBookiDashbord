<?php

namespace App\Interfaces\Rays;

interface RayInfoRepositoryInterface
{
    public function index();
    public function full_index();
    public function update($request);
    
}