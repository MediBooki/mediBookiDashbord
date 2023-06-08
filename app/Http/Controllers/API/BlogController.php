<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SectionResource;
use App\Models\Blog;
use App\Traits\ResponseAPI;

class BlogController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $blogs = Blog::with(['section'])->orderBy('id','DESC');
        if(request()->limit){
            $blogs = $blogs->take(request()->limit)->get();
        }else {
            $blogs = $blogs->paginate(15);
        }
        return $this->sendResponse(BlogResource::collection($blogs), 'Blogs lists send successfully',$blogs->total());
    }
    public function show($id)
    {
        $blog = Blog::with(['section'])->findOrFail($id);
        return $this->sendResponse(new BlogResource($blog), 'blog send successfully');
    }
    
}
