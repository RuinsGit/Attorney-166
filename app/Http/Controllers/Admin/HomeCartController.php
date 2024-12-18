<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeCart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class HomeCartController extends Controller
{
    public function index()
    {
        $homeCarts = HomeCart::all();
        return view('admin.home-cart.index', compact('homeCarts'));
    }

    public function create()
    {
        if (HomeCart::count() > 8) {
            return redirect()->route('admin.home-cart.index')
                ->with('error', 'Yalnız bir şirkət məlumatı əlavə edilə bilər!');
        }
        return view('admin.home-cart.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'description_az' => 'required|string',
            'description_en' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean'
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = public_path('uploads/home-cart');
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $webpFileName = time() . '_' . $originalFileName . '.webp';

                $imageResource = imagecreatefromstring(file_get_contents($file));
                $webpPath = $destinationPath . '/' . $webpFileName;

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                if ($imageResource) {
                    imagewebp($imageResource, $webpPath, 80);
                    imagedestroy($imageResource);

                    $data['image'] = 'uploads/home-cart/' . $webpFileName;
                }
            }

            HomeCart::create($data);

            return redirect()
                ->route('admin.home-cart.index')
                ->with('success', 'Məlumat uğurla əlavə edildi');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Xəta baş verdi: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $homeCart = HomeCart::findOrFail($id);
        return view('admin.home-cart.edit', compact('homeCart'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'description_az' => 'required|string',
            'description_en' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean'
        ]);

        try {
            $homeCart = HomeCart::findOrFail($id);
            $data = $request->all();

            if ($request->hasFile('image')) {
                // Eski resmi sil
                if ($homeCart->image && File::exists(public_path($homeCart->image))) {
                    File::delete(public_path($homeCart->image));
                }

                $file = $request->file('image');
                $destinationPath = public_path('uploads/about');
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $webpFileName = time() . '_' . $originalFileName . '.webp';

                // Klasörün var olduğundan emin ol
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0777, true);
                }

                $imageResource = imagecreatefromstring(file_get_contents($file));
                $webpPath = $destinationPath . '/' . $webpFileName;

                if ($imageResource) {
                    imagewebp($imageResource, $webpPath, 80);
                    imagedestroy($imageResource);

                    $data['image'] = 'uploads/about/' . $webpFileName;
                }
            }

            $homeCart->update($data);

            return redirect()
                ->route('admin.home-cart.index')
                ->with('success', 'Məlumat uğurla yeniləndi');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Xəta baş verdi: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $homeCart = HomeCart::findOrFail($id);

            if ($homeCart->image && File::exists(public_path($homeCart->image))) {
                File::delete(public_path($homeCart->image));
            }

            $homeCart->delete();

            return redirect()
                ->route('admin.home-cart.index')
                ->with('success', 'Məlumat uğurla silindi');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $homeCart = HomeCart::findOrFail($id);
        $homeCart->status = !$homeCart->status;
        $homeCart->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status uğurla dəyişdirildi',
            'newStatus' => $homeCart->status
        ]);
    }
}