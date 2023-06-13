<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>レビュー編集</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
            {{auth()->user()->name}}さん
        </h2>
    </x-slot>
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <!-- text - start -->
      <div class="mb-10 md:mb-16">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">レビュー編集</h2>

        <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
      </div>
      <!-- text - end -->

      <!-- form - start -->
      <form action="{{ route('post.update', $post) }}" method="post" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">

        @csrf
        @method('PUT')
        <div class="sm:col-span-2">
          <label for="nickname" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">ニックネーム</label>
          <input name="nickname" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
          name="nickname" placeholder="ニックネーム" value="{{ old('nickname', $post->nickname) }}" required />
        </div>

        <div class="sm:col-span-2">
          <label for="email" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">メールアドレス</label>
          <input name="email" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
          name="email" placeholder="メールアドレス" value="{{ old('email', $post->email) }}" required />
        </div>

        <div class="sm:col-span-2">
          <label for="review" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">レビュー</label>
          <select name="review" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
          required value="{{ old('review') }}" id="review" >
            <option value="">▼選択してください</option>
            <option value="★☆☆☆☆">★☆☆☆☆</option>
            <option value="★★☆☆☆">★★☆☆☆</option>
            <option value="★★★☆☆">★★★☆☆</option>
            <option value="★★★★☆">★★★★☆</option>
            <option value="★★★★★">★★★★★</option>
          </select>
        </div>

        <div class="sm:col-span-2">
          <label for="body" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">コメント</label>
          <input class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
          name="body" placeholder="コメント" value="{{ old('body', $post->body) }}" required />
        </div>

        <div class="flex items-center justify-between sm:col-span-2">
          <button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">更新する</button>
        </div>

        <p class="text-xs text-gray-400">By signing up to our newsletter you agree to our <a href="#" class="underline transition duration-100 hover:text-indigo-500 active:text-indigo-600">Privacy Policy</a>.</p>
      </form>
      <!-- form - end -->
    </div>
  </div>
</x-app-layout>
</body>
</html>