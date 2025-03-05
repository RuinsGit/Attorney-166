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
        'logo',
        'logo_2',
        'favicon'
    ];

    
    public function getLogoUrlAttribute()
    {
        if ($this->logo && file_exists(public_path($this->logo))) {
            return asset($this->logo);
        }
        return asset('front/assets/images/icons/email-icon.png');
    }

    public function getLogo2UrlAttribute()
    {
        if ($this->logo_2 && file_exists(public_path($this->logo_2))) {
            return asset($this->logo_2);
        }
        return asset('front/assets/images/icons/location-icon.png');
    }

    public function getFaviconUrlAttribute()
    {
        if ($this->favicon && file_exists(public_path($this->favicon))) {
            return asset($this->favicon);
        }
        return asset('front/assets/images/icons/phone-icon.png');
    }
} 