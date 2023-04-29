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
        $medicines = Medicine::Filter()->where('status',1)->orderBy('id','DESC')->with(['category'])->paginate(15);

        $minMaxPrices = Medicine::where('status',1)->selectRaw('MIN(price) as min_price, MAX(price) as max_price')->get();

        // Access the min price and max price using the aliases set in the query
       $minPrice = $minMaxPrices[0]->min_price;
       $maxPrice = $minMaxPrices[0]->max_price;
        $data = [
            'count'=>$medicines->total(),
            'minPrice'=>$minPrice,
            'maxPrice'=>$maxPrice,
        ];
        return $this->sendResponse(MedicineResource::collection($medicines), 'Medicines lists send successfully',$data);
    }

    public function show($id)
    {
        $medicine = Medicine::with(['category'])->findOrFail($id);
        return $this->sendResponse(new MedicineResource($medicine), 'Medicines lists send successfully');
    }

    public function relatedMedicine(Request $request)
    {
        $limit = $request->limit ? $request->limit : 7;
        $medicines = Medicine::
                            where('category_id',$request->category_id)
                            ->where('status',1)
                            ->orderBy('id','DESC')
                            ->with(['category'])
                            ->take($limit)
                            ->get();
        return $this->sendResponse(MedicineResource::collection($medicines), 'Medicines lists send successfully');
    }

}
