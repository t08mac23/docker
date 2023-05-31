<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body>
      <form action="{{ route('master.login') }}"  method="POST" >
        @csrf
        <div class="p-3">
            @error('auth')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-3">
                &#x26A0; {{ $message }}
            </div>
            @enderror
            <label class="block">メールアドレス</label>
            <input class="border rounded mb-3 px-2 py-1" type="text" name="email">
            <label class="block">パスワード</label>
            <input class="border rounded mb-3 px-2 py-1" type="password" name="password">
            <label class="block">ユーザータイプ</label>
            <select name="guard" class="border rounded px-2 py-1 mb-5">
                <option value="">▼選択してください</option>
                <option value="masters">マスター</option>
                <option value="musicians">ミュージシャン</option>
                <option value="athletes">アスリート</option>
            </select>
            <br>
            <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">ログイン</button>
        </div>
      </form>

      @if (session('logout'))
        <div class="alert alert-danger">
          {{ session('logout') }}
        </div>
      @endif

      @if (Auth::guard('masters')->check())
      <div>ユーザーID {{ Auth::guard('masters')->user() }}でログイン中</div>
      @endif
      <ul>
        <li>管理者（Master）ログインユーザー: {{ Auth::guard('masters')->user() }}</li>
      </ul>


      <form method="POST" action="{{ route('master.logout') }}">
          @csrf
          <div class="p-3">
              @error('auth')
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-3">
                  &#x26A0; {{ $message }}
              </div>
              @enderror
              <br>
              <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">ログアウト</button>
          </div>
      </form>
      <form method="POST" action="{{ route('root') }}">
          @csrf
          @method('GET')
          <div class="p-3">
              <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">トップページへ</button>
          </div>
      </form>

  </body>
</html>