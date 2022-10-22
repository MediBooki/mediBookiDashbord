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
    public $timestamps = true;   
}
