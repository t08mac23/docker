<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemUser;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    public function create (Item $item) {
        $color = config('color');
        $category = config('category');
        $plan = config('plan');
        // ログインしていないユーザーは詳細ページへいけない
        if (Auth::guard('web')->user() == null) {
            return redirect('/login');
        }else {
            return view('subscription.create', $item, compact('item'))
            ->with(['color' => $color])->with(['category' => $category])->with(['plan' => $plan]);
        }
    }

    public function store (Request $request) {

        $request->validate([
            'quantity' => 'numeric|between:1,100'
        ]);

        // 商品を登録
        $item_user = new ItemUser();
        $item_user->quantity = $request->quantity;
        $item_user->item_id = $request->item_id;
        $item_user->user_id = Auth::guard('web')->id();

        $item_user->save();

        return redirect()->route('furniture.index');
    }


    // 登録した商品の削除
    public function destroy (ItemUser $item_user, Item $item) {
        $item_user = $item->item_users()->get();
        Log::debug($item_user);

        $item_user->delete();

        return redirect()->route('dashboard');
    }
}