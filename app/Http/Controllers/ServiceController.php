<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Translation;
use App\Models\ContactMessage;
use App\Models\ContactMessageData;
use App\Models\SocialMedia;





class ServiceController extends Controller
{
    public function index()

    {    $socialMediaFooter = SocialMedia::where('status', 1)
        ->orderBy('id')
        ->skip(4)
        ->take(3)
        ->get();
        $contactdata = ContactMessageData::first();
        $header = Header::first();
        $contactmessage = ContactMessage::first();
        $translations = Translation::where('status', 1)->get();
        $services = Service::where('status', 1)->get();
        
        $settings = [
            'service' => 'Xidmətlər',
        ];

        return view('front.pages.service', compact('settings', 'header', 'translations', 'services', 'contactdata', 'contactmessage', 'socialMediaFooter' ));
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