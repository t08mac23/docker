<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- tailwind css -->
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('/css/item_index.css') }}" rel="stylesheet" />
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


        <!-- buttons - start -->
          <button type="button" class=" menu-btn inline-flex items-center gap-2 rounded-lg bg-gray-200 px-2.5 py-2 text-sm font-semibold
            text-gray-500 ring-indigo-300 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base lg:hidden
            navbar-toggler">
            <div class="overlay" id="overlay"></div>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
              Menu
              <div class="menu">
                <div class="menu__item">もどる</div>
                <div class="menu__item">
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
                </div>
                <div class="menu__item">
                  <a href="{{ route('root') }}" class="inline-flex items-center gap-1 text-lg font-semibold text-indigo-500 active:text-indigo-700">
                    @csrf
                    トップページへ
                  </a>
                </div>
                <div class="menu__item">
                  <a href="{{ route('item.index') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">
                      @csrf
                      商品一覧ページへ
                  </a>
                </div>
                <div class="menu__item">
                  <form method="POST" action="{{ route('master.logout') }}">
                    @csrf
                      <input class="bg-red-500 text-white rounded px-3 py-2 hover:bg-red-700" type="submit" value="ログアウト"></input>
                  </form>
                </div>
              </div>
          </button>
        <!-- buttons - end -->
      </header>
    </div>
  </div>
  <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous">
  </script>
  <script src="{{ asset('/js/master.js') }}"></script>
</body>
</html>