<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\DiagnosticRequest;
use App\Interfaces\doctorDashboard\DiagnosticRepositoryInterface;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    protected $diagnostic;
    public function __construct(DiagnosticRepositoryInterface $diagnostic)
    {
        $this->diagnostic = $diagnostic;
    }
    public function store(DiagnosticRequest $request)
    {
        return $this->diagnostic->store($request);
    }

    public function show($id)
    {
        return $this->diagnostic->show($id);
    }
    
    public function addReview(DiagnosticRequest $request)
    {
        return $this->diagnostic->addReview($request);
    }

}
