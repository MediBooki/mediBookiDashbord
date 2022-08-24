<?php

namespace App\Http\Controllers;

use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    protected $insurance;
    public function __construct(InsuranceRepositoryInterface $insurance)
    {
        $this->insurance = $insurance;
    }

    public function index()
    {
        return $this->insurance->index();
    }
    public function store(Request $request)
    {
        return $this->insurance->store($request);
    }
    public function update(Request $request)
    {
        return $this->insurance->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->insurance->destroy($request);
    }
}
