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
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Resmi public/uploads/contactdata klasörüne kaydet
            $image->move(public_path('uploads/contactdata'), $imageName);
            $message->image = 'uploads/contactdata/' . $imageName;
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
            'image' => 'nullable|image',
        ]);

        $contact_messages_datum->message_az = $request->message_az;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Eski resmi sil
            if ($contact_messages_datum->image && file_exists(public_path($contact_messages_datum->image))) {
                unlink(public_path($contact_messages_datum->image));
            }
            
            // Yeni resmi public/uploads/contactdata klasörüne kaydet
            $image->move(public_path('uploads/contactdata'), $imageName);
            $contact_messages_datum->image = 'uploads/contactdata/' . $imageName;
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