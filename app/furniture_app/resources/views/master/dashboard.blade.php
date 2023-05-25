<html>
<head>
  <title>管理画面トップ</title>
</head>
<body>
  <h1>管理画面トップ</h1>

  @if (session('login_msg'))
  <p>{{ session('login_msg') }}</p>
  @endif

  @if (Auth::guard('masters')->check())
  <div>ユーザーID {{ Auth::guard('masters')->user()->userid }}でログイン中</div>
  @endif

  <ul>
    <li>管理者（Administrator）ログインユーザーID: {{ Auth::guard('masters')->check() }}</li>
  </ul>

  <div>
    <a href="/master/logout">ログアウト</a>
  </div>
</body>
</html>