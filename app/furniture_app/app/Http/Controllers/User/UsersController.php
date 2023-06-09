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

    public function index (Item $item, Item_user $subscription) {

        $items = Item::orderBy('created_at', 'desc')->paginate(1);
        $subscriptions = Auth::user()->item_user()->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard', $item, compact( 'items', 'item', 'subscriptions'));
    }
}