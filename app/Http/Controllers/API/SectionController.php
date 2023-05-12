<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $sections = Section::orderBy('id','DESC')->paginate(15);
        return $this->sendResponse(SectionResource::collection($sections), 'Section lists send successfully',$sections->total());
    }
    public function show($id)
    {
        $section = Section::findOrFail($id);
        return $this->sendResponse(new SectionResource($section), 'Section send successfully');
    }
}
