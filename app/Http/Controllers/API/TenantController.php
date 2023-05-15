<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Http\Resources\TenantResource;
use App\Models\Section;
use App\Models\Tenant;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $tenants = Tenant::orderBy('id', 'DESC')->get();
        return $this->sendResponse(TenantResource::collection($tenants), 'tenants lists send successfully');
    }
}
