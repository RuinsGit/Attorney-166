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
use App\Models\SocialMedia;
use App\Models\Subscribe;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $socialMediaFooter = SocialMedia::where('status', 1)
                    ->orderBy('id')
                    ->skip(4)
                    ->take(3)
                    ->get();

        return view('front.pages.index', compact('hero', 'settings', 'cards', 'include', 'services', 'blogs', 'comments', 'contactdata', 'translations', 'header', 'socialMediaFooter'));
    }

    public function storeMessage(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'required|string',
            ]);

            DB::beginTransaction();
            
            $contactMessage = ContactMessage::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
                'status' => false 
            ]);

            
            Mail::to('museyibli.ruhin@gmail.com')->send(new ContactMail($contactMessage));
            
            DB::commit();

            return redirect()->back()->with('success', 'Mesajınız uğurla göndərildi!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Contact message error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xəta baş verdi, zəhmət olmasa yenidən cəhd edin!')->withInput();
        }
    }

    public function subscribe(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|unique:subscribes,email'
            ]);

            Subscribe::create([
                'email' => $validated['email'],
                'status' => true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Abonelik uğurla tamamlandı!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Bir xəta baş verdi, zəhmət olmasa yenidən cəhd edin!'
            ], 422);
        }
    }
} 