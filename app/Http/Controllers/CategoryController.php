<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return $this->category->index();
    }
    public function show($id)
    {
        return $this->category->show($id);
    }
    public function store(CategoryRequest $request)
    {
        return $this->category->store($request);
    }
    public function update(CategoryRequest $request)
    {
        return $this->category->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->category->destroy($request);
    }

}
