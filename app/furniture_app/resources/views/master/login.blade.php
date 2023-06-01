helloworld
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
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

    @if (session('login'))
      <div class="alert alert-danger">
        {{ session('login') }}
      </div>
    @endif

    @if (Auth::guard('masters')->check())
    <div>ユーザーID {{ Auth::guard('masters')->id() }}でログイン中</div>
    @endif

    <ul>
      <li>管理者（Master）ログインユーザー: {{ Auth::guard('masters')->user()->master_name }}</li>
    </ul>

    <form method="post" action="{{ route('item.create') }}">
        @csrf
        @method('GET')
        <div class="p-3">
            <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">商品投稿</button>
        </div>
    </form>

    <form method="post" action="{{ route('item.index') }}">
        @csrf
        @method('GET')
        <div class="p-3">
            <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">商品一覧ページ</button>
        </div>
    </form>
</body>
</html>