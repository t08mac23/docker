<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8/normalize.css">
<body style="max-width: 1000px; margin:0 auto;">
    <header>
    @if (Auth::guard('masters')->check())
      <div>{{ Auth::guard('masters')->user()->master_name }}でログイン中</div>
    @endif
        <nav class="navbar navbar-expand " style="background-color: #41505a; , color:white;">
            <h2 style="color: rgba(201, 224, 247, 0.705)" class="mx-4">uploader</h2>

            <div class="navbar-nav ">
                <a class="btn btn-primary mx-3" href="{{ route('root') }}">トップ </a>
                <a class="btn btn-primary mx-3" href="{{ route('item.create') }}">投稿ページへ</a>
            </div>

        </nav>
    </header>

    <br>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>
</html>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  @foreach($items as $item)
    <div class="mx-4 sm:p-8">
      <div class="mt-4">
        <p> {{ $item->name }} {{ $item->created_at }}</p>
        <a href="storage/images/{{ $item->img_path }}" target=blank>
          <img src="{{ asset('/storage/images/'.$item->img_path) }}" alt="image" style="width:300px;">
        </a>
        <form method="POST" action="{{ route('item.show', $item) }}">
          @csrf
          @method('GET')
          <div class="p-3">
              <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">詳細ページへ</button>
          </div>
        </form>
      </div>
    </div>
  @endforeach
</div>