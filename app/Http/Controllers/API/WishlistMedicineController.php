<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistMedicineController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $medicines= Auth::guard('patient')
            ->user()
            ->wishlist()
            ->with(['category'])
            ->latest()
            ->paginate(15);
        return $this->sendResponse(MedicineResource::collection($medicines), 'Medicines lists send successfully',$medicines->total());
    }

    public function store()
    {
        $medicine_id = Medicine::where([
            ['id', '=' , request('medicine_id')]
        ])->select('id')->first();

        if ($medicine_id && !Auth::guard('patient')->user()->wishlistHas($medicine_id)) {
            Auth::guard('patient')->user()->wishlist()->attach($medicine_id);
            return response()->json(['status'=> true,'wished'=> true]);
        }
        return response()->json(['status'=> true,'wished'=> false]);
    }
    public function destroy($medicine_Id)
    {
        $medicine_id = Medicine::where([
            ['id', '=' , $medicine_Id]
        ])->select('id')->first();
        if ($medicine_id) {
            Auth::guard('patient')->user()->wishlist()->detach($medicine_id);
            return response()->json(['status'=> true,'wished'=> true]);
        }
        return response()->json(['status'=> true,'wished'=> false]);
    }
}
