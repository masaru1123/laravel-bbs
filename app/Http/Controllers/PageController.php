<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::id()
        ]);

        return redirect('/');
    }

    public function list() 
    {
        $comments = Comment::all();
        return view('comments.list', compact('comments'));
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
            abort(403);
        }

        $comment->delete();

        return redirect('/');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
            abort(403);
        }
        $comment->content = $request->content;
        $comment->save();

        return redirect('/');
    }
}
