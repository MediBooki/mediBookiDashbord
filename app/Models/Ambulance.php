<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Ambulance extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['driver_name'];
    protected $guarded = [];
    public $timestamps = true;
}
