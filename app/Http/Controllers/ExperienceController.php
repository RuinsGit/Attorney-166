<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Models\CommentChat;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Translation;
use App\Models\SocialMedia;

class ExperienceController extends Controller
{
    public function index()
    {
        $socialMediaFooter = SocialMedia::where('status', 1)
                    ->orderBy('id')
                    ->skip(4)
                    ->take(3)
                    ->get();
        $translations = Translation::where('status', 1)->get();
        $header = Header::first();
        $comments = CommentChat::latest()->take(3)->get();
        $comment = Comment::latest()->take(3)->get();
        $courses = Course::where('status', 1)->get();
        $settings = [
            'experience' => 'Təcrübə'
        ];

        return view('front.pages.experience', compact('header', 'comments', 'comment', 'settings', 'courses', 'translations', 'socialMediaFooter'));
    }
} 