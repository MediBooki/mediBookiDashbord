<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  

    public function index()
    {
        $services = Service::orderBy('id','DESC')->paginate(15);
        return view('dashboard.services.index', compact('services'));
    }
}
