<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Ambulance extends Model
{
    use HasFactory,HasTranslations, LogsActivity;
    public $translatable = ['driver_name'];
    protected $guarded = [];
    public $timestamps = true;
}
