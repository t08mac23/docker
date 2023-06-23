<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class FurnitureController extends Controller
{
    public function index () {
        $items = Item::orderBy('created_at', 'desc')->paginate(12,["*"], 'item-page');
        $user = auth()->user();
        return view('furniture.index', compact('items', 'user'));
    }

    public function show (Item $item) {
        $color = config('color');
        $category = config('category');
        $plan = config('plan');
        // ログインしていないユーザーは詳細ページへいけない
        if (Auth::guard('masters')->user() == null && Auth::guard('web')->user() == null) {
            return redirect()->route('login');
        }else {
            return view('furniture.show', $item, compact('item'))
            ->with(['color' => $color])->with(['category' => $category])->with(['plan' => $plan]);
        }
    }
}
