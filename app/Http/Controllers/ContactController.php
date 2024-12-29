<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\ContactMessageData;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $header = Header::first();
        $contactdata = ContactMessageData::first();
        $settings = [
            'contact' => 'Əlaqə'
        ];

        return view('front.pages.contact', compact('header', 'contactdata', 'settings'));
    }
} 