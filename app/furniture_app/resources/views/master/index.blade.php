<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body>
    <x-header/>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">Master Login</h2>

        <form action="{{ route('master.login') }}"  method="POST" class="mx-auto max-w-lg rounded-lg border">
            @csrf
            @error('auth')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-3">
                &#x26A0; {{ $message }}
            </div>
            @enderror
            <div class="flex flex-col gap-4 p-4 md:p-8">
            <div>
              <label for="email" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">メールアドレス</label>
              <input name="email" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            <div>
              <label for="password" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">パスワード</label>
              <input name="password" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
            </div>

            <select name="guard" class="mb-2 inline-block text-sm text-gray-800 sm:text-base w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
                <option value="">▼選択してください</option>
                <option value="masters">マスター</option>
                <option value="">ミュージシャン</option>
                <option value="">アスリート</option>
            </select>
            @unless (Auth::guard('masters')->check())
            <button class="block rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100
            hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base" type="submit">ログイン</button>
            @endunless
        </form>
        <div class="flex items-center justify-center bg-gray-100 p-4">
          <p class="text-center text-sm text-gray-500">Don't have an account? <a href="#" class="text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Register</a></p>
        </div>
      </div>
    </div>
    <x-footer/>
  </body>
</html>