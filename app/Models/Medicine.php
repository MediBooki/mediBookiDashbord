<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Medicine extends Model implements HasMedia
{
    use HasFactory,HasTranslations,InteractsWithMedia, LogsActivity;
    public $translatable = ['name','description'];
    protected $guarded = [];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query)
    {
        return  $query->where( function($query ){
            $query->when(!empty(request()->minPrice) ,function($subquery){
                $subquery->where('medicines.price','>=',request()->minPrice);
            })->when(!empty(request()->maxPrice) ,function($subquery){
                $subquery->where('medicines.price','<=',request()->maxPrice);
            })->when(!empty(request()->name) ,function($subquery){
                $subquery->where(DB::raw('name->'.app()->getLocale(request()->lang)),'LIKE', "%" . request()->name . "%");
            })->when(!empty(request()->description) ,function($subquery){
                $subquery->where(DB::raw('description->'.app()->getLocale(request()->lang)),'LIKE', "%" . request()->description . "%");
            })->when(!empty(request()->categories) ,function($subquery){
                $subquery->whereIn('medicines.category_id',request()->categories);
            });
        });
    }
}
