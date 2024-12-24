<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $popularBlogs = Blog::where('is_popular', 1)->get(); // Popüler blogları al
        return view('welcome', compact('popularBlogs'));
    }
} 