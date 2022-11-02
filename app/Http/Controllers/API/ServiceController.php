<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $services = Service::status()->with('doctor')->orderBy('id', 'DESC')->get();
        return $this->sendResponse(ServiceResource::collection($services), 'Services lists send successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Service::where('id', $id)->status()->with('doctor')->firstOrFail();
        return $this->sendResponse(new ServiceResource($services), 'Services lists send successfully');
    }
}
