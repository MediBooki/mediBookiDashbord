<?php

namespace App\Repository\Medicines;


use App\Interfaces\Medicines\MedicineRepositoryInterface;
use App\Models\Category;
use App\Models\Medicine;

class MedicineRepository implements MedicineRepositoryInterface
{
    public function index()
    {
        $medicines = Medicine::orderBy('id','DESC')->paginate(15);
        return view('dashboard.medicines.index', compact('medicines'));
    }
    public function create()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('dashboard.medicines.create', compact('categories'));
    }

    public function store($request)
    {
        $medicine = new Medicine();
        $medicine->name = ['en' => $request->name_en, 'ar' => $request->name];
        $medicine->description = ['en' => $request->description_en, 'ar' => $request->description];
        $medicine->price = $request->price;
        $medicine->manufactured_by = $request->manufactured_by;
        $medicine->category_id =  $request->category_id;
        $medicine->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $medicine->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('medicines.index')->with(['success' => 'Medicine Added Successfully']);
    }
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $categories = Category::orderBy('id','DESC')->get();
        return view('dashboard.medicines.edit', compact('categories','medicine'));
    }
    public function update($request)
    {
        $medicine = Medicine::findOrFail($request->id);
        $medicine->name = ['en' => $request->name_en, 'ar' => $request->name];
        $medicine->description = ['en' => $request->description_en, 'ar' => $request->description];
        $medicine->price = $request->price;
        $medicine->manufactured_by = $request->manufactured_by;
        $medicine->category_id =  $request->category_id;
        $medicine->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $medicine->clearMediaCollection('photo');
            $medicine->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('medicines.index')->with(['success' => 'Medicine Updated Successfully']);
    }
    public function destroy($request)
    {
     
        $medicine = Medicine::findOrFail($request->id);
        $medicine->delete();
        $medicine->clearMediaCollection('photo');
        return redirect()->route('medicines.index')->with(['success' => 'Medicine Deleted Successfully']);
    }
}