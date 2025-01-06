<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\ContactMessageData;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class ContactController extends Controller
{
    public function index()
    {
        $socialMediaFooter = SocialMedia::where('status', 1)
                    ->orderBy('id')
                    ->skip(4)
                    ->take(3)
                    ->get();
        $header = Header::first();
        $contactdata = ContactMessageData::first();
        $settings = [
            'contact' => 'Əlaqə'
        ];

        return view('front.pages.contact', compact('header', 'contactdata', 'settings', 'socialMediaFooter'));
    }
} 