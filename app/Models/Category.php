<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name','description'];
    protected $guarded = [];
    public $timestamps = true;

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
