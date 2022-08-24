<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Insurance extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];
    public $timestamps = true;
}
