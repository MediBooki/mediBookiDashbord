<?php

namespace App\Http\Controllers;

use App\Models\BookDoctor;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function index()
    {
        $bookLists = BookDoctor::pendingStatus()->paginate(15);
        return view('dashboard.bookList.index', compact('bookLists'));
    }
    public function create()
    {
        $bookLists = BookDoctor::acceptStatus()->paginate(15);
        return view('dashboard.bookList.acceptStatus', compact('bookLists'));
    }

    public function update(Request $request)
    {
        $bookList = BookDoctor::findOrFail($request->id);
        $bookList->status = 1;
        $bookList->save();
        return redirect()->route('bookLists.create')->with(['success' => 'Booking Updated Successfully']);
    }

    public function destroy(Request $request)
    {
        $bookList = BookDoctor::findOrFail($request->id);
        $bookList->delete();
        return redirect()->route('bookLists.index')->with(['success' => 'Booking Deleted Successfully']);
    }

}
