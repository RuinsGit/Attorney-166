<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\SocialMedia;
use App\Models\Leader;
use App\Models\Service;
use App\Models\Header;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::firstOrFail();
        $socialMedia = SocialMedia::where('status', 1)
            ->orderBy('order')
            ->get();

        $leadership = Leader::all();
        $header = Header::first();
        $services = Service::all();
        $settings = [
            'about_us' => 'Haqqımızda'
        ];

        return view('front.pages.about', compact('about', 'socialMedia', 'settings', 'leadership', 'header'));
    }
} 