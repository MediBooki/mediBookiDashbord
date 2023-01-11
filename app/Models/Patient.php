<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Passport\HasApiTokens;

class Patient extends Authenticatable implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasApiTokens,Notifiable;
    protected $guarded = [];
    protected $guard = 'patient';
    public $timestamps = true;

    public function wishlist()
    {
        return $this->belongsToMany(Medicine::class, 'wishlist_medicines')->withTimestamps();
    }

    public function wishlistHas($medicineId)
    {
        return self::wishlist()->where('medicine_id', $medicineId->id)->exists();
    }
}
