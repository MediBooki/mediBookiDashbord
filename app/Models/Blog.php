<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Blog extends Model implements HasMedia
{
    use HasFactory,HasTranslations, LogsActivity,InteractsWithMedia;
    public $translatable = ['title','description'];
    protected $guarded = [];
    public $timestamps = true;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
