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









        //新規登録ページの表示
        public function create() {
            return view('master.create');
        }

        // 新規登録の処理
        public function register(Request $request) {

            // バリデーションルールを定義
            $request->validate([
                'master_name'  => 'required',
                'email' => 'required|unique:masters',
                'password' => 'required',
            ]);
            // DBにデータを保存
            $action = $request->get('action', 'return');
            $input  = $request->except('action');
            Log::debug($action);
            if ($action === 'submit') {
                // DBにデータを保存
                $master = new Master();
                $master->fill($input);
                $master->save();

                return view('master.register');
            } else {
                return redirect()->route('master.create')->withInput($input);
            }
        }

}