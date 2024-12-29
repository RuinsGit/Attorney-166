<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $header = Header::first();
        $settings = [
            'experience' => 'Təcrübə'
        ];

        return view('front.pages.experience', compact('header', 'settings'));
    }
} 