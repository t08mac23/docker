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
      $items = Item::orderBy('created_at', 'desc')->paginate(5,["*"], 'item-page');
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

    // 商品をデータベースに保存
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
      return redirect()->route('item.index')->with('message', '投稿しました');
    }


    // 商品の詳細ページへ
    public function show (Item $item) {
      $color = config('color');
      $category = config('category');
      $plan = config('plan');
      // ログインしていないユーザーは詳細ページへいけない
      if (Auth::guard('masters')->user() == null) {
        return redirect('master/index');
      }else{
        return view('master.item.show', compact('item'))->with(['color' => $color])->with(['category' => $category])->with(['plan' => $plan]);
      }
    }


    // 編集ページへ
    public function edit (Item $item) {
      $colors = config('color');
      $categories = config('category');
      $plans = config('plan');
      // ログインしているユーザーと投稿者が同じなら編集ページへ行ける
      if ($item->master_id == Auth::guard('masters')->id()) {
        return view('master.item.edit', compact('item'))->with(['colors' => $colors])->with(['categories' => $categories])->with(['plans' => $plans]);
      }else {
        return redirect()->route('item.show', $item);
      }
    }


    // 商品更新の処理
    public function update (Request $request, Item $item) {

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

      // 商品データ更新
      $item->name = $request->name;
      $item->height = $request->height;
      $item->width = $request->width;
      $item->length = $request->length;
      $item->release_day = $request->release_day;
      $item->color_id = $request->color;
      $item->category_id = $request->category;
      $item->plan_id = $request->plan;

      // 画像保存
      if (request('img_path')) {
        $original = request()->file('img_path')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        request()->file('img_path')->move('storage/images', $name);
        $item->img_path = $name;
      }

      $item->save();

      return view('master.item.show', compact('item'))->with('更新が完了しました');
    }


    // 商品の削除
    public function destroy (Item $item) {
      if ($item->master_id == Auth::guard('masters')->id()) {
        $item->delete();
        return redirect()->route('item.index')->with('message', '投稿を削除際ました');
      }else {
        return redirect()->route('item.show', $item);
      }
    }
}