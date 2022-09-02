<?php

namespace App\Interfaces\doctorDashboard;

interface DiagnosticRepositoryInterface
{
    // public function index();
    // public function create();
    public function show($id);
    // public function edit($id);
    public function store($request);
    public function addReview($request);
    // public function update($request);
    // public function destroy($request);
    
}