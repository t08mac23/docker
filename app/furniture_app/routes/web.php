<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\User\FurnitureController;
use App\Http\Controllers\User\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

include __DIR__ . '/master.php';


Route::get('/', [HomeController::class, 'index'])->name('root');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [UsersController::class, 'index'])->name('dashboard');
});

// 商品一覧・詳細
Route::prefix('furniture')->group(function () {
    Route::get('index', [FurnitureController::class, 'index'])->name('furniture.index');
    Route::get('show/{item}', [FurnitureController::class, 'show'])->name('furniture.show');
    // サブスク
    Route::prefix('subscription')->group(function () {
        Route::get('create/{item}', [SubscriptionController::class, 'create'])->name('sub.create');
        Route::post('store/{item}', [SubscriptionController::class, 'store'])->name('sub.store');
    });
});