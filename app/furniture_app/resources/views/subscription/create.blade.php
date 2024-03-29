<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>サブスク</title>
</head>
<body>
  <x-second_header/>
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-lg px-4 md:px-8">
      <div class="mb-6 sm:mb-10 lg:mb-16">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Your Cart</h2>
      </div>

      <div class="mb-6 flex flex-col gap-4 sm:mb-8 md:gap-6">

        <!-- product - start -->
        <form action="{{ route('sub.store', $item) }}" method="post">
          @csrf
            <div class="flex flex-wrap gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
              <a href="#" class="group relative block h-48 w-32 overflow-hidden bg-gray-100 sm:h-56 sm:w-40">
                <img src="{{ asset('/storage/images/'.$item->img_path) }}" loading="lazy" alt="Photo by vahid kanani" class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
              </a>

              <div class="flex flex-1 flex-col justify-between py-4">
                <div>
                  <a href="#" class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">{{ $item->name }}</a>

                  <span class="block text-gray-500">高さ:{{ $item->height }}</span>
                  <span class="block text-gray-500">横幅:{{ $item->width }}</span>
                  <span class="block text-gray-500">奥行き:{{ $item->length }}</span>
                  <span class="block text-gray-500">カラー:{{ $item->color_name }}</span>
                </div>

                <div>
                  <span class="mb-1 block font-bold text-gray-800 md:text-lg">{{ $item->plan_name }}</span>

                  <span class="flex items-center gap-1 text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>

                    In stock
                  </span>
                </div>
              </div>
              <div class="flex w-full justify-between border-t p-4 sm:w-auto sm:border-none sm:pl-0 lg:p-6 lg:pl-0">
                <div class="flex flex-col items-start gap-2">数量
                  <div class="flex h-12 w-20 overflow-hidden rounded border">
                    <input type="number" name="quantity" value="{{ old('quantity') }}" required min="1" max="100" class="w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" />
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                  </div>
                </div>

                <div class="ml-4 pt-3 md:ml-8 md:pt-2 lg:ml-16">
                  <span class="block font-bold text-gray-800 md:text-lg">{{ $item->plan_name }}</span>
                </div>
              </div>
            </div>
            <!-- product - end -->
          </div>
            <button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">
              Check out
            </button>
        </form>
      </div>
      <!-- totals - end -->
    </div>
  </div>
</body>
</html>