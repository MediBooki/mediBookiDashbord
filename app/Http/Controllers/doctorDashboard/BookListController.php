<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Models\BookDoctor;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function index()
    {
        $data = BookDoctor::doctorAuth()->get(['id', 'date', 'time', 'patient_id']);
        return response()->json($data);
    }
    
}
