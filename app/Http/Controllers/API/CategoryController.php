<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SectionResource;
use App\Models\Category;
use App\Models\Section;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return $this->sendResponse(CategoryResource::collection($categories), 'Section lists send successfully');
    }
    
}
