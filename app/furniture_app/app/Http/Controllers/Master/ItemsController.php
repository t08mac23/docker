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
    // 投稿画面へ遷移
    public function create () {

      if (Auth::guard('masters')->user() == null) {
        return redirect('master/index');
      }else {
        return view('master.item.create');
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
        'color_id'=>'required|numeric',
        'category_id'=>'required|numeric',
        'plan_id'=>'required|numeric',
        'img_path'=>'image|required',
      ]);

      // 商品データ保存
      $item = new Item();
      $item->name = $inputs['name'];
      $item->height = $inputs['height'];
      $item->width = $inputs['width'];
      $item->length = $inputs['length'];
      $item->release_day = $inputs['release_day'];
      $item->color_id = $inputs['color_id'];
      $item->category_id = $inputs['category_id'];
      $item->plan_id = $inputs['plan_id'];
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
}