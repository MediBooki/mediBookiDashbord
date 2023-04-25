<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id','DESC')->paginate(15);
        return view('dashboard.setting.sliders.index', compact('sliders'));
    }
    public function create()
    {
        return view('dashboard.setting.sliders.create');
    }
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->title = ['en' => $request->title_en, 'ar' => $request->title];
        $slider->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $slider->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('sliders.index')->with(['success' => 'Slider Added Successfully']);
    }
    public function update(Request $request)
    {
        $slider = slider::findOrFail($request->id);
        $slider->title = ['en' => $request->title_en, 'ar' => $request->title];
        $slider->save();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $slider->clearMediaCollection('photo');
            $slider->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        return redirect()->route('sliders.index')->with(['success' => 'Slider Updated Successfully']);
    }

    public function destroy(Request $request)
    {
        $slider = Slider::findOrFail($request->id);
        $slider->delete();
        $slider->clearMediaCollection('photo');

        return redirect()->route('sliders.index')->with(['success' => 'Slider Deleted Successfully']);
    }
}
