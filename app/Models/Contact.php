<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'address_az',
        'address_en',
        'address_ru',
        'logo_az',
        'logo_2_az',
        'favicon_az',
        'logo_en',
        'logo_2_en',
        'favicon_en',
        'logo_ru',
        'logo_2_ru',
        'favicon_ru',
    ];
} 