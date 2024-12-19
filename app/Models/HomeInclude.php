<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeInclude extends Model
{
    protected $fillable = [
        'name1_az', 'name1_en', 'name1_ru',
        'text1_az', 'text1_en', 'text1_ru',
        'description1_az', 'description1_en', 'description1_ru',
        'image1',
        'name2_az', 'name2_en', 'name2_ru',
        'text2_az', 'text2_en', 'text2_ru',
        'description2_az', 'description2_en', 'description2_ru',
        'status'
    ];
}