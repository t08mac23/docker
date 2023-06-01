<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\MasterController;
use App\Http\Controllers\Master\ItemsController;

// 管理者のログイン
Route::prefix('master')->group(function () {
  // Route::get('create', [MasterController::class, 'create'])->name('master.create');
  // Route::post('register', [MasterController::class, 'register'])->name('master.register');

  Route::get('index', [MasterController::class, 'index'])->name('master.index');
  Route::post('login', [MasterController::class, 'login'])->name('master.login');
  // ダイレクトアクセスの禁止
  Route::get('login', function () {
    if (Auth::guard('masters')->user() == null) {
      return redirect('master/index');
    }else {
      return view('master.login');
    }
  });
  // ログアウト
  Route::post('index', [MasterController::class, 'logout'])->name('master.logout');

  // Route::get('/', [HomeController::class, 'dashboard'])->name('master.dashboard');

  // 商品投稿・保存・編集・更新・削除
  Route::prefix('item')->group(function () {
    Route::get('index', [ItemsController::class, 'index'])->name('item.index');
    Route::get('create', [ItemsController::class, 'create'])->name('item.create');
    Route::post('store', [ItemsController::class, 'store'])->name('item.store');
    Route::get('show', [ItemsController::class, 'show'])->name('item.show');
  });
});