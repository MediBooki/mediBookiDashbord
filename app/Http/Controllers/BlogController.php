<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Section;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::with(['section'])->orderBy('id','DESC')->paginate(15);
        $sections = Section::orderBy('id','DESC')->get();

        return view('dashboard.blogs.index', compact('blogs','sections'));
    }
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = ['en' => $request->title_en, 'ar' => $request->title];
        $blog->description = ['en' => $request->description_en, 'ar' => $request->description];
        $blog->section_id =  $request->section_id;
        $blog->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $blog->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('blogs.index')->with(['success' => 'blog Added Successfully']);
    }
    public function update(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->title = ['en' => $request->title_en, 'ar' => $request->title];
        $blog->description = ['en' => $request->description_en, 'ar' => $request->description];
        $blog->section_id =  $request->section_id;
        $blog->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $blog->clearMediaCollection('photo');
            $blog->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('blogs.index')->with(['success' => 'blog Updated Successfully']);
    }

    public function destroy(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->delete();
        $blog->clearMediaCollection('photo');

        return redirect()->route('blogs.index')->with(['success' => 'blog Deleted Successfully']);
    }
}
