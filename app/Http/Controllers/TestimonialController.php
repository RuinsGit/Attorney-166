<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Comment;
use App\Models\Translation;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $header = Header::first();
        $comments = Comment::where('status', 1)->latest()->get();
        $translations = Translation::where('status', 1)->get();
        $settings = [
            'testimonials' => 'Müştəri rəyləri'
        ];

        return view('front.pages.testimonials', compact('header', 'comments', 'settings', 'translations'));
    }
} 