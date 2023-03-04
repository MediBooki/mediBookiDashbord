<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function patient(){
        return $this -> belongsToMany(Patient::class,'patient_id');
    }
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class,'order_medicine')->withPivot('qty');
    }
    public function scopePatientCheck($query)
    {
        return $query->where([
            ['patient_id', '=', auth()->user()->id],
            ['check', '=', 0]
        ]);
    }
}
