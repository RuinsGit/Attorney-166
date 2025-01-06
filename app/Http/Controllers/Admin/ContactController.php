<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $contact = $contacts->first();
        return view('back.pages.contact', compact('contacts', 'contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'address_az' => 'required|string',
            'address_en' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_2' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'favicon' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        try {
            $data = $request->all();

            // Logo dosyaları için işlem
            foreach (['logo', 'logo_2', 'favicon'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);
                    $destinationPath = public_path('uploads/contact-info');
                    $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                    // SVG dosyası kontrolü
                    if ($file->getClientOriginalExtension() === 'svg') {
                        $fileName = time() . '_' . $originalFileName . '.svg';
                        $file->move($destinationPath, $fileName);
                        $data[$imageField] = 'uploads/contact-info/' . $fileName;
                    } else {
                        // Diğer resim formatları için webp dönüşümü
                        $webpFileName = time() . '_' . $originalFileName . '.webp';

                        if (!File::exists($destinationPath)) {
                            File::makeDirectory($destinationPath, 0777, true);
                        }

                        $imageResource = imagecreatefromstring(file_get_contents($file));
                        $webpPath = $destinationPath . '/' . $webpFileName;

                        if ($imageResource) {
                            imagewebp($imageResource, $webpPath, 80);
                            imagedestroy($imageResource);
                            $data[$imageField] = 'uploads/contact-info/' . $webpFileName;
                        }
                    }
                }
            }

            Contact::create($data);

            return redirect()->back()->with('success', 'Contact information saved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error occurred: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'address_az' => 'required|string',
            'address_en' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_2' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'favicon' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        try {
            $contact = Contact::first();
            $data = $request->except(['_token', '_method']);

            // Logo dosyaları için işlem
            foreach (['logo', 'logo_2', 'favicon'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    // Eski dosyayı sil
                    if ($contact->{$imageField} && File::exists(public_path($contact->{$imageField}))) {
                        File::delete(public_path($contact->{$imageField}));
                    }

                    $file = $request->file($imageField);
                    $destinationPath = public_path('uploads/contact-info');
                    $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                    // SVG dosyası kontrolü
                    if ($file->getClientOriginalExtension() === 'svg') {
                        $fileName = time() . '_' . $originalFileName . '.svg';
                        $file->move($destinationPath, $fileName);
                        $data[$imageField] = 'uploads/contact-info/' . $fileName;
                    } else {
                        // Diğer resim formatları için webp dönüşümü
                        $webpFileName = time() . '_' . $originalFileName . '.webp';

                        if (!File::exists($destinationPath)) {
                            File::makeDirectory($destinationPath, 0777, true);
                        }

                        $imageResource = imagecreatefromstring(file_get_contents($file));
                        $webpPath = $destinationPath . '/' . $webpFileName;

                        if ($imageResource) {
                            imagewebp($imageResource, $webpPath, 80);
                            imagedestroy($imageResource);
                            $data[$imageField] = 'uploads/contact-info/' . $webpFileName;
                        }
                    }
                }
            }

            $contact->update($data);

            return redirect()->back()->with('success', 'Contact information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error occurred: ' . $e->getMessage())
                ->withInput();
        }
    }
} 