<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\doctorDashboard\LaboratoryRepositoryInterface;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    protected $laboratory;
    public function __construct(LaboratoryRepositoryInterface $laboratory)
    {
        $this->laboratory = $laboratory;
    }
    public function store(Request $request)
    {
        return $this->laboratory->store($request);
    }

    public function update(Request $request)
    {
        return $this->laboratory->update($request);
    }

    public function destroy($request)
    {
        return $this->laboratory->destroy($request);
    }
}
