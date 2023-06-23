<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{

    public function __construct(){
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }


    // 一覧表示
    public function index () {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('post.index', compact('posts'));
    }

    // レビュー投稿保存
    public function store (Request $request) {

        // バリデーション
      $inputs = $request->validate([
        'nickname'=>'required|max:255',
        'email'=>'required|max:255',
        'review'=>'required',
        'body'=>'required|max:255',
      ]);

        // 投稿処理
        $post = new Post();
        $post->nickname = $inputs['nickname'];
        $post->email    = $inputs['email'];
        $post->review   = $inputs['review'];
        $post->body     = $inputs['body'];
        $post->user_id = Auth::guard('web')->id();

        $post->save();
        return redirect()->route('dashboard')->with('message', '投稿しました');
    }



    // レビュー編集・更新
    public function edit (Post $post) {
        return view('post.edit', compact('post'));
    }

    public function update (Request $request, Post $post) {

        // バリデーション
      $inputs = $request->validate([
        'nickname'=>'required|max:255',
        'email'=>'required|max:255',
        'review'=>'required',
        'body'=>'required|max:255',
      ]);

        // 更新
        $post->nickname = $inputs['nickname'];
        $post->email    = $inputs['email'];
        $post->review   = $inputs['review'];
        $post->body     = $inputs['body'];
      $post->save();

        return redirect()->route('dashboard')->with('message', '更新しました');
    }



    // レビュー削除
    public function destroy (Post $post) {
        $post->delete();
        return redirect()->route('dashboard')->with('message', '削除しました');
    }
}
