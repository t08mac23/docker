<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title></title>
</head>
<body>
  <header>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="mb-6 flex items-end justify-between gap-4">
          <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">SELECTED</h2>
          <a href="{{ route('root') }}" class="inline-block rounded-lg border bg-white px-4 py-2 text-center
          text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100
          focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">
            @auth
              {{ Auth::user()->name }}さん
            @endauth
          </a>
          <a href="javascript:history.back()" class="inline-block rounded-lg border bg-white px-4 py-2 text-center
          text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100
          focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">もどる
          </a>
        </div>
      </div>
    </div>
  </header>
</body>
</html>