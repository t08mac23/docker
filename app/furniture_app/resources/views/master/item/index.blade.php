<!DOCTYPE HTML>
<html lang="ja">
  <head>
      <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>商品一覧</title>
      <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('/css/item_index.css')  }}" >
  </head>
  <body>
    <x-header/>

    @foreach($items as $item)
      <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
          <div class="mx-auto max-w-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <div id="float_button" class="float_button">
        <a href="{{ route('item.create') }}">投稿する</a>
    </div>
    <x-footer/>
    <script>
      var windowWidth = $(window).width();
      var windowSm = 768;
      if (windowWidth <= windowSm) {
        //横幅768px以下（スマホ）に適用させるJavaScriptを記述
        $("#float_button").removeClass("float_button");
        $("#float_button").addClass("sm_float_button");
      }else {
        //横幅768px以上（PC、タブレット）に適用させるJavaScriptを記述
        console.log('hello');
      }
    </script>
  </body>
</html>