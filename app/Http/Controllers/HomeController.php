<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Gerekli verileri al ve view'ı döndür
        $settings = [
            'home' => 'Ana Sayfa Başlığı',
            // Diğer ayarlar...
        ];

        return view('front.pages.index', compact('settings'));
    }
} 