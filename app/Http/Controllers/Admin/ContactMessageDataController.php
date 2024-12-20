<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessageData; // Modeli güncelledik
use Illuminate\Http\Request;

class ContactMessageDataController extends Controller
{
    public function index()
    {
        $messages = ContactMessageData::all();
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.contact_messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message_az' => 'required',
            'image' => 'nullable|image',
        ]);

        $message = new ContactMessageData(); // Model ismini güncelledik
        $message->message_az = $request->message_az;

        if ($request->hasFile('image')) {
            $message->image = $request->file('image')->store('uploads/contactdata', 'public');
        }

        $message->save();
        return redirect()->route('admin.contact-messages-data.index');
    }

    public function edit(ContactMessageData $contact_messages_datum)
    {
        return view('admin.contact_messages.edit', ['contactMessage' => $contact_messages_datum]);
    }

    public function update(Request $request, ContactMessageData $contact_messages_datum)
    {
        $request->validate([
            'message_az' => 'required',
            'message_en' => 'required',
            'message_ru' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $contact_messages_datum->message_az = $request->message_az;
        $contact_messages_datum->message_en = $request->message_en;
        $contact_messages_datum->message_ru = $request->message_ru;

        if ($request->hasFile('image')) {
            $contact_messages_datum->image = $request->file('image')->store('uploads/contactdata', 'public');
        }

        $contact_messages_datum->save();
        return redirect()->route('admin.contact-messages-data.index');
    }

    public function destroy(ContactMessageData $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact-messages-data.index')->with('success', 'Mesaj silindi.');
    }
}