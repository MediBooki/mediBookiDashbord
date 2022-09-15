<?php

namespace App\Http\Controllers;

use App\Interfaces\Medicines\MedicineRepositoryInterface;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    protected $medicine;
    public function __construct(MedicineRepositoryInterface $medicine)
    {
        $this->medicine = $medicine;
    }

    public function index()
    {
        return $this->medicine->index();
    }
    public function create()
    {
        return $this->medicine->create();
    }
    public function store(Request $request)
    {
        return $this->medicine->store($request);
    }
    public function edit($id)
    {
        return $this->medicine->edit($id);
    }
    public function update(Request $request)
    {
        return $this->medicine->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->medicine->destroy($request);
    }
}
