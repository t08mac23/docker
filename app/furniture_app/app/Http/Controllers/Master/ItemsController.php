<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Master;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class ItemsController extends Controller
{

  // 商品一覧ページ
  public function index () {

    if (Auth::guard('masters')->user() == null) {
      return redirect('master/index');
    }else {
      $items = Item::orderBy('created_at', 'desc')->get();
      $user = auth()->user();
      return view('master.item.index', compact('items', 'user'));
    }
  }


    // 投稿画面へ遷移
    public function create () {

      $colors = config('color');
      $categories = config('category');
      $plans = config('plan');
      if (Auth::guard('masters')->user() == null) {
        return redirect('master/index');
      }else {
        return view('master.item.create')->with(['colors' => $colors])->with(['categories' => $categories])->with(['plans' => $plans]);
      }
    }

    // データベースに保存
    public function store (Request $request) {

      // バリデーション
      $inputs = $request->validate([
        'name'=>'required',
        'height'=>'required',
        'width'=>'required',
        'length'=>'required',
        'release_day'=>'required',
        'color_id'=>'numeric',
        'category_id'=>'numeric',
        'plan_id'=>'numeric',
        'img_path'=>'image|required',
      ]);

      // 商品データ保存
      $item = new Item();
      $item->name = $inputs['name'];
      $item->height = $inputs['height'];
      $item->width = $inputs['width'];
      $item->length = $inputs['length'];
      $item->release_day = $inputs['release_day'];
      $item->color_id = $request->color;
      $item->category_id = $request->category;
      $item->plan_id = $request->plan;
      $item->master_id = Auth::guard('masters')->id();

      // 画像保存
      if (request('img_path')) {
        $original = request()->file('img_path')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        request()->file('img_path')->move('storage/images', $name);
        $item->img_path = $name;
      }

      $item->save();
      return view('master.item.store');
    }

    public function show () {
      return view('master.item.show');
    }
}