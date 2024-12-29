<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogType;
use App\Models\Header;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $header = Header::first();
        $settings = [
            'blog' => 'Bloqlar',
        ];

        $blogs = Blog::where('status', 1)->latest()->get();
        $popularBlogs = Blog::where('is_popular', 1)->where('status', 1)->get();
        $blogTypes = BlogType::all();

        return view('front.pages.blog', compact('settings', 'blogs', 'popularBlogs', 'blogTypes', 'header'));
    }

    public function detail($id)
    {
        $settings = [
            'blog' => 'Bloq Detalı',
        ];

        $blog = Blog::findOrFail($id);
        
        // Son bloglar
        $recentBlogs = Blog::where('status', 1)
            ->where('id', '!=', $id)
            ->latest()
            ->take(6)
            ->get();
        
        // Popüler bloglar
        $popularBlogs = Blog::where('status', 1)
            ->where('is_popular', 1)
            ->where('id', '!=', $id)
            ->latest()
            ->take(6)
            ->get();

        // Diğer bloglar
        $otherBlogs = Blog::where('status', 1)
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->take(6)
            ->get();

        return view('front.pages.blog-detail', compact('settings', 'blog', 'recentBlogs', 'popularBlogs', 'otherBlogs', 'header'));
    }
} 