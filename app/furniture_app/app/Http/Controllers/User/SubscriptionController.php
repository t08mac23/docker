<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
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

    public function store (Request $request, Item $item) {

        // 商品を登録
        $subscription = new Subscription();
        $subscription->quantity = $request->quantity;
        $subscription->item_id = $request->item_id;
        $subscription->user_id = Auth::guard('web')->id();

        $subscription->save();

        return redirect()->route('furniture.index');
    }
}