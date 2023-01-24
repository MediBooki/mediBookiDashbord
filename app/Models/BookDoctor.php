<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BookDoctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function scopePatientAuth($query)
    {
        return $query->where('patient_id',Auth::user()->id);
    }

    public function scopeDoctorAuth($query)
    {
        return $query->where('doctor_id',Auth::user()->id);
    }

    public function scopePendingStatus($query)
    {
        return $query->where('status',0);
    }

    public function scopeAcceptStatus($query)
    {
        return $query->where('status',1);
    }

}
