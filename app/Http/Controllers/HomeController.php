<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeHero;
use App\Models\HomeCart;
use App\Models\HomeInclude;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\ContactMessage;
use App\Models\ContactMessageData;
use App\Models\Translation;
use App\Models\Header;

class HomeController extends Controller
{
    public function index()
    {
        $settings = [
            'home' => 'Ana Sayfa Başlığı',
        ];
        $header = Header::first();
        $hero = HomeHero::first();
        $cards = HomeCart::where('status', 1)->latest()->get();
        $include = HomeInclude::where('status', 1)->first();
        $services = Service::where('status', 1)->latest()->get();
        $blogs = Blog::where('status', 1)->latest()->get();
        $comments = Comment::where('status', 1)->latest()->get();
        $contactdata = ContactMessageData::first();
        $translations = Translation::where('status', 1)->get();

        return view('front.pages.index', compact('hero', 'settings', 'cards', 'include', 'services', 'blogs', 'comments', 'contactdata', 'translations', 'header'));
    }

    public function storeMessage(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            ContactMessage::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
                'status' => false
            ]);

            return redirect()->back()->with('success', 'Mesajınız uğurla göndərildi!');
        } catch (\Exception $e) {
            \Log::error('Contact message error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xəta baş verdi, zəhmət olmasa yenidən cəhd edin!')->withInput();
        }
    }
} 