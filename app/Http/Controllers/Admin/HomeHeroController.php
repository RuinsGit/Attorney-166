<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeHero;

class HomeHeroController extends Controller
{
    public function index()
    {
        $homeHero = HomeHero::first();
        return view('admin.home_hero.index', compact('homeHero'));
    }

    public function update(Request $request)
    {
        $homeHero = HomeHero::firstOrNew();

        if ($request->hasFile('image')) {
            if ($homeHero->image && file_exists(public_path('uploads/' . $homeHero->image))) {
                unlink(public_path('uploads/' . $homeHero->image));
            }
            
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $homeHero->image = $fileName;
        }

        if ($request->hasFile('background_image')) {
            if ($homeHero->background_image && file_exists(public_path('uploads/' . $homeHero->background_image))) {
                unlink(public_path('uploads/' . $homeHero->background_image));
            }
            
            $file = $request->file('background_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $homeHero->background_image = $fileName;
        }

        $homeHero->fill($request->only([
            'text_az',
            'text_en',
            'text_ru',
            'description_az',
            'description_en',
            'description_ru',
            'number_az',
            'number_en',
            'number_ru',
            'mail_az',
            'mail_en',
            'mail_ru',
            'text2_az',
            'text2_en',
            'text2_ru'
        ]));

        try {
            $homeHero->save();
            return redirect()->route('admin.home-hero.index')->with('success', 'Home Hero tənzimləmələri uğurla saxlanıldı.');
        } catch (\Exception $e) {
            return redirect()->route('admin.home-hero.index')->with('error', 'Bir xəta baş verdi: ' . $e->getMessage());
        }
    }
}