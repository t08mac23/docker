perfect

<form method="post" action="{{ route('item.index') }}">
    @csrf
    @method('GET')
    <div class="p-3">
        <button class="bg-blue-500 text-white rounded px-3 py-2" type="submit">商品一覧ページへ</button>
    </div>
</form>