<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="bg-white lg:pb-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <header class="flex items-center justify-between py-4 md:py-8">
        <!-- logo - start -->
        <a href="/" class="text-black-800 inline-flex items-center gap-2.5 text-2xl font-bold md:text-3xl" aria-label="logo">
          <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-6 text-indigo-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M96 0V47L48 94H0V47L48 0H96Z" />
          </svg>
          ADMINISTRATORS
        </a>
        <!-- logo - end -->

        <!-- nav - start -->
        <nav class="hidden gap-12 lg:flex navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
          <a href="{{ route('master.login') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">
            @if (Auth::guard('masters')->check())
              <div>ユーザーID: M00{{ Auth::guard('masters')->id() }}でログイン中</div>
              <ul>
                <li>管理者ユーザー: {{ Auth::guard('masters')->user()->master_name }}</li>
              </ul>
            @endif
            @if (session('logout'))
              <div class="alert alert-danger">
                {{ session('logout') }}
              </div>
            @endif
          </a>
          <a href="#" class="inline-flex items-center gap-1 text-lg font-semibold text-indigo-500">
            <form method="POST" action="{{ route('root') }}">
              @csrf
              @method('GET')
              <div class="p-3">
                  <button class="bg-blue-300 text-white rounded px-3 py-2" type="submit">トップページへ</button>
              </div>
            </form>
          </a>
          <a href="#" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">
            <form method="POST" action="{{ route('item.index') }}">
              @csrf
              @method('GET')
              <div class="p-3">
                  <button class="bg-green-500 text-white rounded px-3 py-2" type="submit">商品一覧ページへ</button>
              </div>
            </form>
          </a>
          <div class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">
            <form method="POST" action="{{ route('master.logout') }}">
              @csrf
              <div class="p-3">
                <button class="bg-red-500 text-white rounded px-3 py-2" type="submit">ログアウト</button>
              </div>
            </form>
          </div>
        </nav>
        <!-- nav - end -->

        <!-- buttons - start -->
          <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-gray-200 px-2.5 py-2 text-sm font-semibold
            text-gray-500 ring-indigo-300 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base lg:hidden
            navbar-toggler" id="hamburger">
            <div class="overlay" id="overlay"></div>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
              Menu
          </button>
        <!-- buttons - end -->
      </header>
    </div>
  </div>
  <script src="{{ asset('/js/master.js') }}"></script>
</body>
</html>