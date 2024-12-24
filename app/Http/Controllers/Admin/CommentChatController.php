<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommentChat;
use Illuminate\Http\Request;

class CommentChatController extends Controller
{
    // Yorumları listele
    public function index()
    {
        $comments = CommentChat::all();
        return view('back.pages.comment_chat.index', compact('comments'));
    }

    // Yorum ekleme
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        CommentChat::create($request->all());

        return redirect()->route('admin.comment_chat.index')->with('success', 'Yorum ugurla elave edildi.');
    }

    public function destroy($id)
    {
        $comment = CommentChat::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comment_chat.index')->with('success', 'Yorum ugurla silindi.');
    }
}
