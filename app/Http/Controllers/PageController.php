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
        $content = $request->input('content');

        Comment::create([
            'content' => $content
        ]);

        return redirect('/list');
    }

    public function list() 
    {
        $comments = Comment::all();
        return view('comments.list', compact('comments'));
    }
}
