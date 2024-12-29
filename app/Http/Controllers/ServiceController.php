<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $header = Header::first();
        // Gerekli verileri al ve view'ı döndür
        $settings = [
            'service' => 'Xidmətlər',
            // Diğer ayarlar...
        ];

        return view('front.pages.service', compact('settings', 'header'));
    }
} 