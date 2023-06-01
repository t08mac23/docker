<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>商品投稿</title>
  </head>
  <body>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
      <img src="{{ asset('img/portfolio/1.jpg') }}" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
      <div class="absolute inset-0 bg-[url(/img/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
      <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
        <div class="mx-auto max-w-md">
        <h1>商品の投稿</h1>
          <img src="{{ asset('img/portfolio/1.jpg') }}" class="h-6" alt="Tailwind Play" />
          <div class="divide-y divide-gray-300/50">
            <div class="space-y-6 py-8 text-base leading-7 text-gray-600">
              <form action="{{ route('item.store') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="form-group">
                  <label>写真</label>
                    <input type="file" name="img_path" required>
                  </div>
                <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="name" placeholder="商品名" value="{{ old('name') }}" required>
                <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="height" placeholder="高さ" value="{{ old('height') }}" required>
                <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="width" placeholder="横幅" value="{{ old('width') }}" required>
                <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="length" placeholder="奥行き" value="{{ old('length') }}" required>
                <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="release_day" placeholder="発売日" value="{{ old('release_day') }}" required>

                <select name="color" required value="{{ old('color_id') }}" id="color" class="px-4 my-5 border shadow rounded w-3/4">
                  @foreach($colors as $color_id => $name)
                    <option value="" hidden>カラー</option>
                    <option value="{{ $color_id }}" >{{ $name }}</option>
                  @endforeach
                </select>
                <select name="category" required value="{{ old('category_id') }}" id="category" class="px-4 my-5 border shadow rounded w-3/4">
                  @foreach($categories as $category_id => $name)
                    <option value="" hidden>カテゴリー</option>
                    <option value="{{ $category_id }}" >{{ $name }}</option>
                  @endforeach
                </select>
                <select name="plan" required value="{{ old('plan_id') }}" id="plan" class="px-4 my-5 border shadow rounded w-3/4">
                  @foreach($plans as $plan_id => $name)
                    <option value="" hidden>プラン</option>
                    <option value="{{ $plan_id }}" >{{ $name }}</option>
                  @endforeach
                </select>

                <div class="p-6 flex items-center ">
                    <button type="submit" value="submit" class="rounded bg-blue-700 text-white py-4 px-8">{{ __('投稿') }}</button>
                </div>
              </form>
            </div>
            <div class="pt-8 text-base font-semibold leading-7">
              <form method="POST" action="{{ route('master.login') }}">
              @csrf
              @method('GET')
                <button class="text-sky-500 hover:text-sky-600">トップページへ &rarr;</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>