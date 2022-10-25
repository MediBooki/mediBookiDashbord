<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $medicines = Medicine::orderBy('id','DESC')->get();
        return $this->sendResponse(MedicineResource::collection($medicines), 'Medicines lists send successfully');
    }
    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


}
