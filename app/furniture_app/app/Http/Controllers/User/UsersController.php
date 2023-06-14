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
    public function index (ItemUser $item_user, Item $item, Post $post, Request $request) {

        $items = Item::orderBy('created_at', 'desc')->paginate(1);

        // 登録した商品一覧とページネーション
        $item_users = Auth::user()->Item_users()->orderBy('created_at', 'desc')->paginate(10,["*"], 'item-page')
        ->appends(["post-page" => $request->input('post-page')]);

        // 投稿したレビューの一覧とページネーション
        $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->paginate(8,["*"], 'post-page')
        ->appends(["item-page" => $request->input('item-page')]);

        return view('dashboard', $item, compact( 'items', 'item', 'item_users', 'item_user', 'posts'));
    }

    // マイページでの登録した商品詳細
    public function show (ItemUser $item_user, Item $item) {

        $item_user = $item->item_users()->get();
        Log::debug($item_user);

        $color = config('color');
        $category = config('category');
        $plan = config('plan');
        return view('dashboard_show', $item_user, compact('item', 'item_user'))
            ->with(['color' => $color])->with(['category' => $category])->with(['plan' => $plan]);
    }

}