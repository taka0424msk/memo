<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post()
    {
        return view('posts.post');
    }

    public function showCreate()
    {
        return view('posts.showCreate');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required|min:5'
        ],
        [
            'title.required' => 'タイトルを記入してください',
            'body.required' => '内容を記入してくだいさい',
            'body.min' => '５文字以上記入してください'
        ]);

        $user = Auth::user();

        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.post');
    }

    public function showPost(Post $post)
    {
        return view('posts.showPost')
            ->with(['post' => $post]);
    }

    public function showEdit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }

    public function edit(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.showPost', $post)
            ->with([
                'edit_success' => '内容が編集されました',
            ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.post');
    }
}
