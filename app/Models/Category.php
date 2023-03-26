<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasFactory,HasTranslations, LogsActivity,InteractsWithMedia;
    public $translatable = ['name','description'];
    protected $guarded = [];
    public $timestamps = true;

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
