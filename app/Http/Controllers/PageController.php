<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

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
            'content' => $request->input('content')
        ]);

        return redirect('/list');
    }

    public function list() 
    {
        $comments = Comment::all();
        return view('comments.list', compact('comments'));
    }

    public function delete($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect('/list');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->content = $request->content;
        $comment->save();

        return redirect('/list');
    }
}
