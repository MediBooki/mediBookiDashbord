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
        $medicines = Medicine::orderBy('id','DESC')->with(['section'])->paginate(15);
        return $this->sendResponse(MedicineResource::collection($medicines), 'Medicines lists send successfully',$medicines->total());
    }

    public function show($id)
    {
        $medicine = Medicine::with(['section'])->findOrFail($id);
        
        return $this->sendResponse(new MedicineResource($medicine), 'Medicines lists send successfully');
    }


}
