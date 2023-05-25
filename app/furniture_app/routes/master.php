<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\MasterController;

// 管理者のログイン
Route::prefix('master')->group(function () {
  Route::get('create', [MasterController::class, 'create'])->name('master.create');
  Route::post('register', [MasterController::class, 'register'])->name('master.register');

  Route::get('index', [MasterController::class, 'index'])->name('master.index');
  Route::post('login', [MasterController::class, 'login'])->name('master.login');
  // ダイレクトアクセスの禁止
  Route::get('login', function () {
    return redirect('master/index');
  });
  // ログアウト
  Route::post('logout', [MasterController::class, 'logout'])->name('master.logout');

  // Route::get('/', [HomeController::class, 'dashboard'])->name('master.dashboard');
});