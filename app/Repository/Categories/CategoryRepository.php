<?php

namespace App\Repository\Categories;

use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Models\Category;


class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(15);
        return view('dashboard.categories.index', compact('categories'));
    }


    public function show($id)
    {
        $category =  Category::with(['medicines'])->findOrFail($id);

        return view('dashboard.categories.show', compact('category'));
    }
    public function store($request)
    {
        $category = new Category();
        $category->name = ['en' => $request->name_en, 'ar' => $request->name];
        $category->description = ['en' => $request->description_en, 'ar' => $request->description];
        $category->save();
       
        return redirect()->route('categories.index')->with(['success' => 'category Added Successfully']);
    }
    public function update($request)
    {
        $category = Category::findOrFail($request->id);
        $category->name = ['en' => $request->name_en, 'ar' => $request->name];
        $category->description = ['en' => $request->description_en, 'ar' => $request->description];
        $category->save();
        return redirect()->route('categories.index')->with(['success' => 'category Updated Successfully']);
    }
    public function destroy($request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->route('categories.index')->with(['success' => 'category Deleted Successfully']);
    }
}