<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Section extends Model implements HasMedia
{
    use HasFactory,HasTranslations,InteractsWithMedia;
    public $translatable = ['name','description'];
    protected $guarded = [];
    public $timestamps = true;

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
