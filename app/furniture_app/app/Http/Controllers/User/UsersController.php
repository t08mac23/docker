<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\ItemUser;
use App\Models\Post;

use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{

    public function __construct(){
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }

    // マイページでの登録した商品一覧
    public function index (ItemUser $item_user, Item $item, Post $post) {

        $items = Item::orderBy('created_at', 'desc')->paginate(1);
        $item_users = Auth::user()->Item_users()->orderBy('created_at', 'desc')->paginate(5);
        $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->paginate(4);
        return view('dashboard', $item, compact( 'items', 'item', 'item_users', 'item_user', 'posts'));
    }

    // マイページでの登録した商品詳細
    public function show (ItemUser $item_user, Item $item) {

        Log::debug($item_user);
        $item_user = ItemUser::find($item);
        Log::debug($item_user);

        $color = config('color');
        $category = config('category');
        $plan = config('plan');
        return view('dashboard_show', $item_user, compact('item', 'item_user'))
            ->with(['color' => $color])->with(['category' => $category])->with(['plan' => $plan]);
    }

}