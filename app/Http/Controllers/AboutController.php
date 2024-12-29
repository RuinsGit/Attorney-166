<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\SocialMedia;
use App\Models\Leader;
use App\Models\Service;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::firstOrFail();
        $socialMedia = SocialMedia::where('status', 1)
            ->orderBy('order')
            ->get();

        $leadership = Leader::all();
        $services = Service::all();
        $settings = [
            'about_us' => 'Haqqımızda'
        ];

        return view('front.pages.about', compact('about', 'socialMedia', 'settings', 'leadership'));
    }
} 