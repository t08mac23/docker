<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Master;

class HomeController extends Controller
{
    public function index () {
        $items = Item::orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        return view('index', compact('items', 'user'));
    }
}
