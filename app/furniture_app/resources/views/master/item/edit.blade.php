<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>商品編集</title>
  </head>
  <body>
    <x-header/>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
      <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
        <div class="mx-auto max-w-md">
          <div class="divide-y divide-gray-300/50">
            <div class="space-y-6 py-8 text-base leading-7 text-gray-600">
              <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                  <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">商品編集</h2>
              </div>
              <form action="{{ route('item.update', $item) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <img src="{{ asset('/storage/images/'.$item->img_path) }}" alt="image" style="width:200px;">
                </div>
                <div class="form-group">
                  <label>商品名：</label>
                  <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="name" placeholder="商品名" value="{{ old('name', $item->name) }}" required>
                </div>
                <div class="form-group">
                  <label>高さ  ：</label>
                  <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="height" placeholder="高さ" value="{{ old('height', $item->height) }}" required>
                </div>
                <div class="form-group">
                  <label>横幅  ：</label>
                  <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="width" placeholder="横幅" value="{{ old('width', $item->width) }}" required>
                </div>
                <div class="form-group">
                  <label>奥行き：</label>
                  <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="length" placeholder="奥行き" value="{{ old('length', $item->length) }}" required>
                </div>
                <div class="form-group">
                  <label>発売日：</label>
                  <input type="text" class="px-4 my-5 border shadow rounded w-3/4" name="release_day" placeholder="発売日" value="{{ old('release_day', $item->release_day) }}" required>
                </div>

                <div class="form-group">
                  <label>カラー：</label>
                  <select name="color" required id="color" class="px-4 my-5 border shadow rounded w-3/4">
                    @foreach($colors as $color_id => $name)
                      <option value="{{ old('color_id', $item->$color_id) }}" hidden>{{ $item->color_name }}</option>
                      <option value="{{ $color_id }}" >{{ $name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>種類：</label>
                  <select name="category" required id="category" class="px-4 my-5 border shadow rounded w-3/4">
                    @foreach($categories as $category_id => $name)
                      <option value="{{ old('category_id', $item->$category_id) }}" hidden>{{ $item->category_name }}</option>
                      <option value="{{ $category_id }}" >{{ $name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>プラン：</label>
                  <select name="plan" required id="plan" class="px-4 my-5 border shadow rounded w-3/4">
                    @foreach($plans as $plan_id => $name)
                      <option value="{{ old('plan_id', $item->$plan_id) }}" hidden>{{ $item->plan_name }}</option>
                      <option value="{{ $plan_id }}" >{{ $name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="p-6 flex items-center ">
                    <button type="submit" value="submit" class="rounded bg-blue-800 text-white py-4 px-8">{{ __('更新') }}</button>
                </div>
              </form>
            </div>
            <div class="pt-8 text-base font-semibold leading-7">
              <form method="POST" action="{{ route('item.show', $item) }}">
              @csrf
              @method('GET')
                <button type="submit" value="submit" class="rounded bg-blue-400 text-white py-4 px-8">{{ __('キャンセル') }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <x-footer/>
  </body>
</html>