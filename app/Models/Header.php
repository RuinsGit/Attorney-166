<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'homepage_title_az',
        'homepage_title_en',
        'homepage_title_ru',
        'about_title_az',
        'about_title_en',
        'about_title_ru',
        'services_title_az',
        'services_title_en',
        'services_title_ru',
        'blog_title_az',
        'blog_title_en',
        'blog_title_ru',
        'testimonials_title_az',
        'testimonials_title_en',
        'testimonials_title_ru',
        'experience_title_az',
        'experience_title_en',
        'experience_title_ru',
        'contact_title_az',
        'contact_title_en',
        'contact_title_ru',
        'logo',
    ];
}