<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogType;
use App\Models\Header;
use Illuminate\Http\Request;
use App\Models\Translation;
use App\Models\SocialMedia;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $socialMedia = SocialMedia::where('status', 1)
            ->orderBy('order')
            ->take(4)
            ->get();

            $socialMediaFooter = SocialMedia::where('status', 1)
                    ->orderBy('id')
                    ->skip(4)
                    ->take(3)
                    ->get();
        $header = Header::first();
        $translations = Translation::all();
        $settings = [
                'blog' => 'Bloqlar',
        ];



        $query = Blog::where('status', 1);
        
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title_' . app()->getLocale(), 'LIKE', "%{$search}%")
                  ->orWhere('description_' . app()->getLocale(), 'LIKE', "%{$search}%")
                  ->orWhereHas('blogType', function($q) use ($search) {
                      $q->where('title_' . app()->getLocale(), 'LIKE', "%{$search}%");
                  });
            });
        }

        // Blog type filtering
        if ($request->has('type') && $request->type != 'allBlogs') {
            $type = $request->get('type');
            if (str_starts_with($type, 'type_')) {
                $typeId = substr($type, 5);
                $query->where('blog_type_id', $typeId);
            }
        }

        $blogs = $query->latest()->paginate(6)->withQueryString();
        $popularBlogs = Blog::where('is_popular', 1)->where('status', 1)->get();
        $blogTypes = BlogType::all();

        if ($request->ajax()) {
            return view('front.pages.blog-list', compact('blogs'))->render();
        }

        return view('front.pages.blog', compact('settings', 'blogs', 'popularBlogs', 'blogTypes', 'header', 'translations', 'socialMedia', 'socialMediaFooter'));
    }

    public function detail($id)
    {
        $header = Header::first();
        $translations = Translation::all();
        
        $settings = [
            'blog' => 'Bloq Detalı',
        ];

        $blog = Blog::findOrFail($id);
        $socialMedia = SocialMedia::where('status', 1)
            ->orderBy('order')
            ->take(4)
            ->get();    
        
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

        return view('front.pages.blog-detail', compact('settings', 'blog', 'recentBlogs', 'popularBlogs', 'otherBlogs', 'header', 'translations', 'socialMedia'));
    }
} 