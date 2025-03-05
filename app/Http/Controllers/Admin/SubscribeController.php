<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    
    public function index()
    {
        $subscribes = Subscribe::all();
        return view('back.pages.subscribe.index', compact('subscribes'));
    }

    
    public function destroy($id)
    {
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->delete();

        return redirect()->route('admin.subscribe.index')->with('success', 'Abunəlik silindi.');
    }

   
    public function changeStatus(Request $request, $id)
    {
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->status = $request->status;
        $subscribe->save();

        return response()->json(['status' => 'success']);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email',
        ]);

        Subscribe::create([
            'email' => $request->email,
            'status' => 1, 
        ]);

        return redirect()->route('admin.subscribe.index')->with('success', 'Abunəlik yaradıldı.');
    }
}