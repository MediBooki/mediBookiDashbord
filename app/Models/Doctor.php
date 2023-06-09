<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Doctor extends Authenticatable implements HasMedia
{
    use HasFactory,HasTranslations,InteractsWithMedia;
    public $translatable = ['name','experience','education'];
    protected $guarded = [];
    public $timestamps = true;

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class,'appointment_doctor');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function reviews()
    {
        return $this->hasMany(DoctorReview::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopeFilter($query)
    {
        return  $query->where( function($query ){
            $query->when(!empty(request()->titles) ,function($subquery){
                $subquery->whereIn('doctors.title',request()->titles);
            })->when(!empty(request()->genders) ,function($subquery){
                $subquery->whereIn('doctors.gender',request()->genders);
            })->when(!empty(request()->name) ,function($subquery){
                $subquery->whereRaw('LOWER(JSON_EXTRACT(name, "$.' . app()->getLocale(request()->lang) . '")) LIKE ?', ["%" . strtolower(request()->name) . "%"]);
            })->when(!empty(request()->specialization) ,function($subquery){
                $subquery->whereRaw('LOWER(JSON_EXTRACT(specialization, "$.' . app()->getLocale(request()->lang) . '")) LIKE ?', ["%" . strtolower(request()->specialization) . "%"]);
            })->when(!empty(request()->sections) ,function($subquery){
                $subquery->whereIn('doctors.section_id',request()->sections);
            });
        });
    }
}
