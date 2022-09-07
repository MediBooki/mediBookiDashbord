<?php

namespace App\Http\Controllers;

use App\Interfaces\Labs\LabInfoRepositoryInterface;
use Illuminate\Http\Request;

class LabInfoController extends Controller
{
    protected $lab;
    public function __construct(LabInfoRepositoryInterface $lab)
    {
        $this->lab = $lab;
    }

    public function index()
    {
        return $this->lab->index();
    }

    public function full_index()
    {
        return $this->lab->full_index();
    }

    public function update(Request $request)
    {
        return $this->lab->update($request);
    }
}
