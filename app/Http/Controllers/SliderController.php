<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create()
    {
        return view('dashboard.setting.sliders.create');
    }
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->save();
        foreach ($request->input('document', []) as $file) {
            $slider->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }
        return redirect()->route('sliders.create')->with(['success' => 'Slider Added Successfully']);
    }
    public function saveSliderImage(Request $request )
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('dzfile');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
