@extends('layouts.app')
@section('title','商品一覧')
@section('content')
<main class='product-list'>
    <section class="product-form">
        <!-- 商品検索覧 -->
       <div class="product-form__title--group">
        <h2 class="product-form__title">商品一覧</h2>
       </div>
        <div class="product-form__search--textbox">
            <form class="search-form" action="/products/search" method="get">
                <input type="text" name="name" placeholder="商品名で検索" value="{{ request('name') }}">
                <p>
                    <button type="submit" class="search-submit" style="display">検索</button>
                </p>
                <label for="price-filter">価格順で表示</label>
                <p>
                <select id="price-filter" name="sort" onchange="this.form.submit()">
                    <!-- name="sort" ; フォーム送信時にサーバーへ送られるパラメータ名(sortとして送信) -->
                    <option value="">価格で並べ替え</option>
                    <!-- value="" : 初期値。並べ替えをしない状態  -->
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>低い順</option>
                    <!-- value="asc" : "asc"は昇順 (安い -> 高い) -->
                    <!-- {{ request('sort') == 'asc' ? 'selected' : '' }} request('sort') == 'asc' -> 現在のsortが'asc'なら"selected"を追加 -->
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>高い順</option>
                </select>
                </p>
            </form>
        </div>
    </section>

    <div class="content-create__button">
        <button type="button" class="btn-content-btn" onclick="location.href='{{ route('products.register') }}'">+ 商品を追加</button>
    </div>

    <div class="content-grid">
        <!-- 商品カード -->
    @foreach ($products as $productId)
        <div class="products-card">
            <a href="{{ route('products.content_detail', $productId->id) }}">
                <img src="{{ asset('storage/' . $productId->image) }}" alt="{{ $productId->name }}">
            </a>
            <p class="products-name">{{ $productId->name }}</p>
            <p class="products-price">{{ $productId->price }}</p>
        </div>
    @endforeach
    </div>
{{ $products->links('pagination::bootstrap-4' )}}
</main>
@endsection

