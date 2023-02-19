<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Interfaces\Sections\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $section;
    public function __construct(SectionRepositoryInterface $section)
    {
        $this->section = $section;
    }

    public function index()
    {
        return $this->section->index();
    }
    public function show($id)
    {
        return $this->section->show($id);
    }
    public function store(SectionRequest $request)
    {
        return $this->section->store($request);
    }
    public function update(SectionRequest $request)
    {
        return $this->section->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->section->destroy($request);
    }

}
