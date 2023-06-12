<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Appointment;
use App\Models\Section;
use Illuminate\Support\Facades\DB;


class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        $sections = Section::orderBy('id','DESC')->paginate(15);
        return view('dashboard.sections.index', compact('sections'));
    }


    public function show($id)
    {
        $doctors = Section::findOrFail($id)->doctors;
        $section =  Section::findOrFail($id);
        $appointments = Appointment::orderBy('id','DESC')->get();

        return view('dashboard.sections.show', compact('section','doctors','appointments'));
    }
    public function store($request)
    {
        $section = new Section();
        $section->name = ['en' => $request->name_en, 'ar' => $request->name];
        $section->description = ['en' => $request->description_en, 'ar' => $request->description];
        $section->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $section->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('sections.index')->with(['success' => 'section Added Successfully']);
    }
    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->name = ['en' => $request->name_en, 'ar' => $request->name];
        $section->description = ['en' => $request->description_en, 'ar' => $request->description];
        $section->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $section->clearMediaCollection('photo');
            $section->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('sections.index')->with(['success' => 'section Updated Successfully']);
    }
    public function destroy($request)
    {
        $section = Section::findOrFail($request->id);
        $section->delete();
        $section->clearMediaCollection('photo');
        return redirect()->route('sections.index')->with(['success' => 'section Deleted Successfully']);
    }
}