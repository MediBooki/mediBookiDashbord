<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ray extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
