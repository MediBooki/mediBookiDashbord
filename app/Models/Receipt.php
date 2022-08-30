<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
