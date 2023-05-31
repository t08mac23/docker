<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MasterController extends Controller
{


    //ログインページの表示
    public function index() {
        return view('master.index');
    }


    //ログイン処理
    public function login(Request $request) {

        $credentials = $request->only(['email', 'password']);
        $guard = $request->guard;

        if(Auth::guard($guard)->attempt($credentials)) {

            return view('master.login')->with([
                'login' => 'ログインしました'
            ]); // ログインしたらリダイレクト
        }

        return back()->withErrors([
            'auth' => ['認証に失敗しました']
        ]);
    }

    //ログアウト処理
    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('master.index')->with([
            'logout' => 'ログアウトしました',
        ]);;

    }

}