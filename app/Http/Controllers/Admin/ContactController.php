<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'address_az' => 'nullable|string',
            'address_en' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,svg|max:2048',
            'logo_2' => 'nullable|image|mimes:png,jpg,svg|max:2048',
            'favicon' => 'nullable|image|mimes:png,jpg,svg|max:2048',
        ]);

        $contactData = $request->all();

        // Resimleri kaydetme
        foreach (['logo', 'logo_2', 'favicon'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $destinationPath = public_path('uploads/contact-info');

                // Dizin var mı kontrol et, yoksa oluştur
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $webpFileName = time() . '_' . $originalFileName . '.webp';

                $imageResource = imagecreatefromstring(file_get_contents($file));
                $webpPath = $destinationPath . '/' . $webpFileName;

                if ($imageResource) {
                    // WebP dosyasını kaydet
                    if (!imagewebp($imageResource, $webpPath, 80)) {
                        \Log::error('WebP dosyası kaydedilemedi: ' . $webpPath);
                    }
                    imagedestroy($imageResource);

                    $contactData[$imageField] = 'uploads/contact-info/' . $webpFileName;
                } else {
                    \Log::error('Resim kaynağı oluşturulamadı: ' . $file->getClientOriginalName());
                }
            }
        }

        // Kontrol: Yüklenen dosyaların adlarını kontrol edin
        \Log::info('Yüklenen dosyalar:', $contactData);

        Contact::create($contactData);

        return redirect()->back()->with('success', 'Contact information saved successfully.');
    }

    public function update(Request $request)
    {
        // Validasyon
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'address_az' => 'nullable|string',
            'address_en' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,svg|max:2048',
            'logo_2' => 'nullable|image|mimes:png,jpg,svg|max:2048',
            'favicon' => 'nullable|image|mimes:png,jpg,svg|max:2048',
        ]);

        // İlgili contact kaydını güncelleyin
        $contact = Contact::first(); // veya uygun bir şekilde contact'ı alın
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address_az = $request->address_az;
        $contact->address_en = $request->address_en;
        $contact->address_ru = $request->address_ru;

        // Logo ve favicon dosyalarını yükleyin
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = public_path('uploads/contact-info');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $webpFileName = time() . '_' . $originalFileName . '.webp';

            // Dizin var mı kontrol et, yoksa oluştur
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $imageResource = imagecreatefromstring(file_get_contents($file));
            $webpPath = $destinationPath . '/' . $webpFileName;

            if ($imageResource) {
                // WebP dosyasını kaydet
                if (!imagewebp($imageResource, $webpPath, 80)) {
                    \Log::error('WebP dosyası kaydedilemedi: ' . $webpPath);
                }
                imagedestroy($imageResource);

                $contact->logo = 'uploads/contact-info/' . $webpFileName;
            }
        }

        if ($request->hasFile('logo_2')) {
            $file = $request->file('logo_2');
            $destinationPath = public_path('uploads/contact-info');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $webpFileName = time() . '_' . $originalFileName . '.webp';

            // Dizin var mı kontrol et, yoksa oluştur
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $imageResource = imagecreatefromstring(file_get_contents($file));
            $webpPath = $destinationPath . '/' . $webpFileName;

            if ($imageResource) {
                // WebP dosyasını kaydet
                if (!imagewebp($imageResource, $webpPath, 80)) {
                    \Log::error('WebP dosyası kaydedilemedi: ' . $webpPath);
                }
                imagedestroy($imageResource);

                $contact->logo_2 = 'uploads/contact-info/' . $webpFileName;
            }
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $destinationPath = public_path('uploads/contact-info');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $webpFileName = time() . '_' . $originalFileName . '.webp';

            // Dizin var mı kontrol et, yoksa oluştur
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $imageResource = imagecreatefromstring(file_get_contents($file));
            $webpPath = $destinationPath . '/' . $webpFileName;

            if ($imageResource) {
                // WebP dosyasını kaydet
                if (!imagewebp($imageResource, $webpPath, 80)) {
                    \Log::error('WebP dosyası kaydedilemedi: ' . $webpPath);
                }
                imagedestroy($imageResource);

                $contact->favicon = 'uploads/contact-info/' . $webpFileName;
            }
        }

        $contact->save();

        return redirect()->back()->with('success', 'Əlaqə məlumatları uğurla yeniləndi.');
    }
} 