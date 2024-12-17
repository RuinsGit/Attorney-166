<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    use HasFactory;

    protected $table = 'home_hero';

    protected $fillable = [
        'text_az',
        'text_en',
        'text_ru',
        'description_az',
        'description_en',
        'description_ru',
        'number_az',
        'number_en',
        'number_ru',
        'mail_az',
        'mail_en',
        'mail_ru',
        'text2_az',
        'text2_en',
        'text2_ru',
        'image',
        'background_image'
    ];
}