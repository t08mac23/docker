<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>レビューの一覧</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          レビューの一覧
        </h2>
    </x-slot>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-md px-4 md:px-8">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl xl:mb-12">Customer Reviews</h2>


        <div class="divide-y">
          <!-- review - start -->
          @foreach($posts as $post)
            <div class="flex flex-col gap-3 py-4 md:py-8">
              <div>
                <span class="block text-sm font-bold">レビュー：{{ $post->review }}</span>
                <span class="block text-sm font-bold">ニックネーム{{ $post->nickname }}</span>
                <span class="block text-sm text-gray-500">投稿日：{{ $post->created_at }}</span>
              </div>
              <p class="text-gray-600">{!! nl2br(e($post->body)) !!}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
</x-app-layout>
</body>
</html>