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
                <input type="text" name="name" placeholder="商品名で検索">
                <p>
                    <button type="submit" class="search-submit" style="display">検索</button>
                </p>
            </form>
        </div>
        <div class="product-form__filter--group">
            <label for="price-filter">価格順で表示</label>
            <p>
            <select id="price-filter">
                <option value="">価格で並べ替え</option>
            </select>
            </p>
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
                <img src="{{ asset('storage/image/' . $productId->image) }}" alt="{{ $productId->name }}">
            </a>
            <p class="products-name">{{ $productId->name }}</p>
            <p class="products-price">{{ $productId->price }}</p>
        </div>
    @endforeach
    </div>
</main>
@endsection

