<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bendahara extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'email_verified',
        'profile_photo_url',
    ];
}
