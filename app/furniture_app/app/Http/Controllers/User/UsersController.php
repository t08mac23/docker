<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\item_user;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{

    public function __construct(){
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }

    // マイページでの登録した商品一覧
    public function index (Item $item, Item_user $item_user) {

        $items = Item::orderBy('created_at', 'desc')->paginate(1);
        $item_users = Auth::user()->item_user()->orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard', $item, compact( 'items', 'item', 'item_users'));
    }

    // マイページでの登録した商品詳細
    public function show (Item $item, Item_user $item_user) {

        $color = config('color');
        $category = config('category');
        $plan = config('plan');
        return view('dashboard_show', $item, compact('item', 'item_user'))
            ->with(['color' => $color])->with(['category' => $category])->with(['plan' => $plan]);
    }

}