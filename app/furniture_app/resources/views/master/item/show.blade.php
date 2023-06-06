<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>商品詳細</title>
</head>
<body>
  <x-header/>
  <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
      <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
        <div class="mx-auto max-w-md">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
              <div class="mt-4">
                <img src="{{ asset('/storage/images/'.$item->img_path) }}" alt="image" style="width:300px;">
                <div>商品名：{{ $item->name}} </div>
                <div> 高さ：{{ $item->height }} </div>
                <div> 横幅：{{ $item->width }} </div>
                <div> 奥行き：{{ $item->length }} </div>
                <div> 発売日：{{ $item->release_day }} </div>
                <div> カラー：{{ $item->color_id }} </div>
                <div> カテゴリー：{{ $item->category_id }} </div>
                <div> プラン：{{ $item->plan_id }} </div>
                <p> 投稿者：{{ $item->master->master_name }} </p>
                <p> 投稿日：{{ $item->created_at }} </p>
                <p> 更新日：{{ $item->updated_at }} </p>

                @if($item->master_id == Auth::guard('masters')->id())
                  <form method="POST" action="{{ route('item.edit', $item) }}">
                    @csrf
                    @method('GET')
                    <div class="p-3">
                        <button class="bg-yellow-500 text-white rounded px-3 py-2" type="submit">編集ページへ</button>
                    </div>
                  </form>

                  <form method="POST" action="{{ route('item.destroy', $item->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="p-3">
                        <button class="bg-red-300 bg-red-500 text-white rounded px-3 py-2" type="submit"
                        onClick="return confirm('本当に削除しますか?');">削除する</button>
                    </div>
                  </form>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <x-footer/>
</body>
</html>