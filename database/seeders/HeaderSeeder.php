<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Header;

class HeaderSeeder extends Seeder
{
    public function run()
    {
        Header::create([
            'homepage_title_az' => 'Ana Səhifə',
            'homepage_title_en' => 'Homepage',
            'homepage_title_ru' => 'Главная страница',
            'about_title_az' => 'Haqqımızda',
            'about_title_en' => 'About Us',
            'about_title_ru' => 'О нас',
            'services_title_az' => 'Xidmətlər',
            'services_title_en' => 'Services',
            'services_title_ru' => 'Услуги',
            'blog_title_az' => 'Blog',
            'blog_title_en' => 'Blog',
            'blog_title_ru' => 'Блог',
            'testimonials_title_az' => 'Müştəri Rəyleri',
            'testimonials_title_en' => 'Customer Reviews',
            'testimonials_title_ru' => 'Отзывы клиентов',
            'experience_title_az' => 'Təcrübə',
            'experience_title_en' => 'Experience',
            'experience_title_ru' => 'Опыт',
            'contact_title_az' => 'Əlaqə',
            'contact_title_en' => 'Contact',
            'contact_title_ru' => 'Контакт',
            'logo' => null, // veya bir logo yolu
        ]);
    }
}