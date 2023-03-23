<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements  HasMedia
{
    use HasFactory  , InteractsWithMedia;
    
    protected $fillable = [
        'name',
        'email',
        'address',
        // 'profile_image',
        // 'password',
    ];
}
