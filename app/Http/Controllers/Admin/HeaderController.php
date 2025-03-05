<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Header; 

class HeaderController extends Controller
{
    public function edit()
    {
        $header = Header::first(); 
        return view('back.pages.header', compact('header'));
    }

    public function update(Request $request)
    {
        
        $header = Header::firstOrNew();

       
        if ($request->hasFile('logo')) {
           
            if ($header->logo && file_exists(public_path('uploads/' . $header->logo))) {
                unlink(public_path('uploads/' . $header->logo));
            }

          
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move(public_path('uploads'), $fileName); 
            $header->logo = $fileName; 
        }

    
        $header->fill($request->only([
            'homepage_title_az',
            'homepage_title_en',
            'homepage_title_ru',
            'about_title_az',
            'about_title_en',
            'about_title_ru',
            'services_title_az',
            'services_title_en',
            'services_title_ru',
            'blog_title_az',
            'blog_title_en',
            'blog_title_ru',
            'testimonials_title_az',
            'testimonials_title_en',
            'testimonials_title_ru',
            'experience_title_az',
            'experience_title_en',
            'experience_title_ru',
            'contact_title_az',
            'contact_title_en',
            'contact_title_ru'
        ]));

        try {
            $header->save();
            return redirect()->route('admin.header.edit')->with('success', 'Header tənzimləmələri uğurla saxlanıldı.');
        } catch (\Exception $e) {
            return redirect()->route('admin.header.edit')->with('error', 'Bir xəta baş verdi: ' . $e->getMessage());
        }
    }
}