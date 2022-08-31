<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Doctor extends Authenticatable implements HasMedia
{
    use HasFactory,HasTranslations,InteractsWithMedia;
    public $translatable = ['name'];
    protected $guarded = [];
    public $timestamps = true;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class,'appointment_doctor');
    }
}
