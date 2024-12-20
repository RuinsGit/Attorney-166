<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    // Abunelikleri listele
    public function index()
    {
        $subscribes = Subscribe::all();
        return view('back.pages.subscribe.index', compact('subscribes'));
    }

    // Abuneliği silme
    public function destroy($id)
    {
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->delete();

        return redirect()->route('admin.subscribe.index')->with('success', 'Abunəlik silindi.');
    }

    // Abuneliğin durumunu değiştirme
    public function changeStatus(Request $request, $id)
    {
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->status = $request->status;
        $subscribe->save();

        return response()->json(['status' => 'success']);
    }

    // Abuneliği kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email',
        ]);

        Subscribe::create([
            'email' => $request->email,
            'status' => 1, // Varsayılan olarak aktif
        ]);

        return redirect()->route('admin.subscribe.index')->with('success', 'Abunəlik yaradıldı.');
    }
}