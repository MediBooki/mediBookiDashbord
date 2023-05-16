<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::orderBy('id','DESC')->paginate(15);
        return view('dashboard.terms.index', compact('terms'));
    }
    public function store(Request $request)
    {
        $term = new Term();
        $term->title = ['en' => $request->title_en, 'ar' => $request->title];
        $term->description = ['en' => $request->description_en, 'ar' => $request->description];
        $term->save();
      
        return redirect()->route('terms.index')->with(['success' => 'term Added Successfully']);
    }
    public function update(Request $request)
    {
        $term = Term::findOrFail($request->id);
        $term->title = ['en' => $request->title_en, 'ar' => $request->title];
        $term->save();
        return redirect()->route('terms.index')->with(['success' => 'term Updated Successfully']);
    }

    public function destroy(Request $request)
    {
        $term = Term::findOrFail($request->id);
        $term->delete();
        $term->clearMediaCollection('photo');

        return redirect()->route('terms.index')->with(['success' => 'terms Deleted Successfully']);
    }
}
