<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeInclude;
use Illuminate\Http\Request;

class HomeIncludeController extends Controller
{
    public function index()
    {
        $homeIncludes = HomeInclude::all();
        return view('admin.home-includes.index', compact('homeIncludes'));
    }

    public function create()
    {
        if (HomeInclude::count() >= 1) {
            return redirect()->route('admin.home-includes.index')
                             ->with('error', 'Artıq bir qeyd mövcuddur. Yeni əlavə etmək mümkün deyil.');
        }

        return view('admin.home-includes.create');
    }

    public function store(Request $request)
    {
        if (HomeInclude::count() >= 1) {
            return redirect()->route('admin.home-includes.index')
                             ->with('error', 'Artıq bir qeyd mövcuddur. Yeni əlavə etmək mümkün deyil.');
        }

        $request->validate([
            'name1_az' => 'required|string|max:255',
            'text1_az' => 'required|string|max:255',
            'description1_az' => 'required|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'name2_az' => 'required|string|max:255',
            'text2_az' => 'required|string|max:255',
            'description2_az' => 'required|string',
            'status' => 'required|boolean'
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image1')) {
                $file = $request->file('image1');
                $destinationPath = public_path('uploads/home-includes');
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                
               
                if ($file->getClientOriginalExtension() === 'svg') {
                    $fileName = time() . '_' . $originalFileName . '.svg';
                    $file->move($destinationPath, $fileName);
                    $data['image1'] = 'uploads/home-includes/' . $fileName;
                } else {
                   
                    $webpFileName = time() . '_' . $originalFileName . '.webp';

                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }

                    $imageResource = imagecreatefromstring(file_get_contents($file));
                    $webpPath = $destinationPath . '/' . $webpFileName;

                    if ($imageResource) {
                        imagewebp($imageResource, $webpPath, 80);
                        imagedestroy($imageResource);
                        $data['image1'] = 'uploads/home-includes/' . $webpFileName;
                    }
                }
            }

            HomeInclude::create($data);

            return redirect()
                ->route('admin.home-includes.index')
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
        $homeInclude = HomeInclude::findOrFail($id);
        return view('admin.home-includes.edit', compact('homeInclude'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name1_az' => 'required|string|max:255',
            'text1_az' => 'required|string|max:255',
            'description1_az' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'name2_az' => 'required|string|max:255',
            'text2_az' => 'required|string|max:255',
            'description2_az' => 'required|string',
            'status' => 'required|boolean'
        ]);

        try {
            $homeInclude = HomeInclude::findOrFail($id);
            $data = $request->all();

            if ($request->hasFile('image1')) {
               
                if (file_exists(public_path($homeInclude->image1))) {
                    unlink(public_path($homeInclude->image1));
                }

                $file = $request->file('image1');
                $destinationPath = public_path('uploads/home-includes');
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                
                
                if ($file->getClientOriginalExtension() === 'svg') {
                    $fileName = time() . '_' . $originalFileName . '.svg';
                    $file->move($destinationPath, $fileName);
                    $data['image1'] = 'uploads/home-includes/' . $fileName;
                } else {
                    
                    $webpFileName = time() . '_' . $originalFileName . '.webp';

                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }

                    $imageResource = imagecreatefromstring(file_get_contents($file));
                    $webpPath = $destinationPath . '/' . $webpFileName;

                    if ($imageResource) {
                        imagewebp($imageResource, $webpPath, 80);
                        imagedestroy($imageResource);
                        $data['image1'] = 'uploads/home-includes/' . $webpFileName;
                    }
                }
            }

            $homeInclude->update($data);

            return redirect()
                ->route('admin.home-includes.index')
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
            $homeInclude = HomeInclude::findOrFail($id);
            
          
            if (file_exists(public_path($homeInclude->image1))) {
                unlink(public_path($homeInclude->image1));
            }
            
            $homeInclude->delete();

            return redirect()
                ->route('admin.home-includes.index')
                ->with('success', 'Məlumat uğurla silindi');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $homeInclude = HomeInclude::findOrFail($id);
        $homeInclude->status = !$homeInclude->status;
        $homeInclude->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status uğurla dəyişdirildi',
            'newStatus' => $homeInclude->status
        ]);
    }
}