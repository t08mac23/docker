<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Master;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index (Item $item, Post $post) {
        $items = Item::orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('index', compact('items', 'user', 'posts'));
    }
}
