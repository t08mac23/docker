<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>家具一覧</title>
</head>
<body>
  <header></header>
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="mb-6 flex items-end justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Selected</h2>
        <a href="{{ route('dashboard') }}" class="inline-block rounded-lg border bg-white px-4 py-2 text-center
        text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100
        focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">
          @auth
            {{ Auth::user()->name }}さん
          @endauth
        </a>
        <a href="{{ route('root') }}" class="inline-block rounded-lg border bg-white px-4 py-2 text-center
        text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100
        focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">トップページへ
        </a>
      </div>
      <div class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
        <!-- product - start -->
        @foreach($items as $item)
            <div>
              <a href="{{ route('furniture.show', $item) }}" class="group relative mb-2 block h-80 overflow-hidden rounded-lg bg-gray-100 lg:mb-3">
                <img src="{{ asset('/storage/images/'.$item->img_path) }}" alt="image" loading="lazy" alt="Photo by Rachit Tank" class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
              </a>

              <div>
                <a href="{{ route('furniture.show', $item) }}" class="hover:gray-800 mb-1 text-gray-500 transition duration-100 lg:text-lg">{{ $item->name }}</a>

                <div class="flex items-end gap-2">
                  <span class="font-bold text-gray-800 lg:text-lg">{{ $item->created_at }}</span>
                </div>
                <form method="POST" action="{{ route('furniture.show', $item) }}">
                  @csrf
                  @method('GET')
                  <div class="p-3">
                      <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">詳細ページへ</button>
                  </div>
                </form>
              </div>
            </div>
        @endforeach
        {{ $items->appends(request()->input())->links() }}
            <!-- product - end -->
      </div>
    </div>
  </div>
  <x-footer/>
</body>
</html>