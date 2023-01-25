<?php

namespace App\Http\Controllers\doctorDashboard;

use App\Http\Controllers\Controller;
use App\Models\BookDoctor;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function index()
    {
        $bookLists = BookDoctor::doctorAuth()->acceptStatus()->paginate(15);
        return view('dashboard.doctorDashboard.bookList.index', compact('bookLists'));
    }

    
}
