@if (Auth::guard('masters')->check())
  <div>{{ Auth::guard('masters')->user()->master_name }}でログイン中</div>
@endif

<div>
    <img src="{{ asset('/storage/images/'.$item->img_path) }}" alt="image" style="width:300px;">

  <p> 投稿者：{{ $item->master->master_name }} </p>
</div>

<div>商品名：{{ $item->name}} </div>
<div> 高さ：{{ $item->height }} </div>
<div> 横幅：{{ $item->width }} </div>
<div> 奥行き：{{ $item->length }} </div>
<div> 発売日：{{ $item->release_day }} </div>
<div> カラー：{{ $item->color_id }} </div>
<div> カテゴリー：{{ $item->category_id }} </div>
<div> プラン：{{ $item->plan_id }} </div>
<p> 投稿日：{{ $item->created_at }} </p>
<p> 更新日：{{ $item->updated_at }} </p>


<form method="POST" action="{{ route('item.edit', $item) }}">
  @csrf
  @method('GET')
  <div class="p-3">
      <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">編集ページへ</button>
  </div>
</form>

<form method="POST" action="{{ route('item.index') }}">
  @csrf
  @method('GET')
  <div class="p-3">
      <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">商品一覧ページへ</button>
  </div>
</form>