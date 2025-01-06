<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Comment;
use App\Models\Translation;
use App\Models\CommentChat;
use App\Models\Subscribe;
use App\Models\SocialMedia;

use Illuminate\Http\Request;
 

class TestimonialController extends Controller
{
    public function index() 
    {
        $socialMediaFooter = SocialMedia::where('status', 1)
                    ->orderBy('id')
                    ->skip(4)
                    ->take(3)
                    ->get();
        $header = Header::first();
        $comments = Comment::where('status', 1)->latest()->take(3)->get();
        $translations = Translation::where('status', 1)->get();
        $settings = [
            'testimonials' => 'Müştəri rəyləri'

        ];

        return view('front.pages.testimonials', compact('header', 'comments', 'settings', 'translations', 'socialMediaFooter'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'comment' => 'required|string'
            ]);

            CommentChat::create([
                'name' => $validated['name'],
                'comment' => $validated['comment']
            ]);

            return redirect()->back()->with('success', 'Təşəkkür edirik! Şərhiniz uğurla əlavə edildi. 🎉');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Təəssüf ki, şərhiniz əlavə edilmədi. Zəhmət olmasa yenidən cəhd edin.')->withInput();
        }
    }
} 