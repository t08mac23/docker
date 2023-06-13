<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Master;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index () {
        $items = Item::orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        // $posts = Post::all()->orderBy('created_at', 'desc')->paginate(6);
        return view('index', compact('items', 'user'));
    }
}
