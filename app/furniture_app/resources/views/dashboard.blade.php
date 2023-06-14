<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>マイページ</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
            {{auth()->user()->name}}さん
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white py-6 sm:py-8 lg:py-12">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                        <!-- text - start -->
                        <div class="mb-10 md:mb-16">
                            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                                <a href="{{ route('root') }}" >Your Furniture</a>
                            </h2>
                            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
                        </div>
                        <!-- text - end -->

                        <!-- items - start -->
                        @foreach(auth()->user()->items as $item)
                            <div class="grid gap-6 sm:grid-cols-2">
                                    <div class="flex items-end gap-2">
                                        <span class="font-bold text-gray-800 lg:text-lg">
                                            <p class="hover:gray-800 mb-1 text-gray-500 transition duration-100 lg:text-lg">商品名：{{$item->name}}</p>
                                            <p class="hover:gray-800 mb-1 text-gray-600 transition duration-100 lg:text-lg">数量：{{$item->pivot->quantity}}</p>
                                            <p class="hover:gray-800 mb-1 text-gray-400 transition duration-100 lg:text-lg">登録日：{{$item->pivot->created_at}}</p>
                                        </span>
                                    </div>
                                <a href="#" class="group relative flex h-80 items-end overflow-hidden rounded-lg bg-gray-100 p-4 shadow-lg">
                                    <img src="{{ asset('/storage/images/'.$item->img_path) }}" alt="image" loading="lazy" alt="Photo by Rachit Tank"class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50"></div>

                                    <div class="relative flex flex-col">
                                        <span class="text-gray-300">Home</span>
                                        <span class="text-lg font-semibold text-white lg:text-xl">Decoration</span>
                                    </div>
                                </a>
                                <form method="POST" action="{{ route('dashboard.show', $item) }}">
                                    @csrf
                                    @method('GET')
                                    <div class="p-3">
                                        <button class="hover:gray-800 mb-1 text-blue-500 transition duration-100 lg:text-lg" type="submit">詳細ページへ</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                        {{ $item_users->appends(request()->input())->links() }}
                        <!-- items - end -->


                        <div class="mb-10 md:mb-16">
                            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                                <a href="{{ route('root') }}" >Your Furniture</a>
                            </h2>
                            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
                        </div>
                        <div class="bg-white py-6 sm:py-8 lg:py-12">
                            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                                <div class="mb-6 flex items-end justify-between gap-4">
                                    <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">REVIEWS</h2>
                                </div>

                                <div class="grid gap-x-4 gap-y-6 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
                                    <!-- product - start -->
                                    @foreach(auth()->user()->posts as $post)
                                        <div>
                                            <a href="#" class="group mb-2 block h-96 overflow-hidden rounded-lg bg-gray-100 shadow-lg lg:mb-3">
                                            {!! nl2br(e($post->body)) !!}
                                            </a>

                                            <div class="flex flex-col">
                                                <span class="text-gray-500">{{ $post->nickname }}</span>
                                                <a href="#" class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">{{ $post->review }}</a>
                                                <a href="#" class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">{{ $post->created_at }}</a>
                                            </div>
                                            @if($post->user_id == Auth::guard('web')->id())
                                                <form method="POST" action="{{ route('post.edit', $post) }}">
                                                    @csrf
                                                    @method('GET')
                                                    <div class="p-3">
                                                        <button class="bg-yellow-500 text-green-800 rounded px-3 py-2" type="submit">編集ページへ</button>
                                                    </div>
                                                </form>

                                                <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="p-3">
                                                        <button class="bg-red-300 bg-red-500 text-red-600 rounded px-3 py-2" type="submit"
                                                        onClick="return confirm('本当に削除しますか?');">削除する</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    @endforeach
                                    <!-- product - end -->
                                    {{ $posts->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                        </x-app-layout>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

