@extends('layouts/app')

@section('content')
<div class="content">
    <div class="content-form">
        <h2 class="content-form__title">商品登録</h2>
    </div>
    <form class="form" action="/products/register" method="post" enctype="multipart/form-data">
        @csrf
        <!-- 商品名 -->
        <div class="contact-form__group">
            <div class="contact-form__group--label">
                <label for="label-name">商品名</label>
                <span class="label-require">※必須</span>
            </div>
            <div class="contact-form__group--input">
                <input type="text" id="label-name" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
            </div>
            <div class="contact-form__group--error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <!-- 値段 -->
        <div class="contact-form__group">
            <div class="contact-form__group--label">
                <label for="label-price">値段</label>
                <span class="label-require">※必須</span>
            </div>
            <div class="contact-form__group--input">
                <input type="price" id="label-price" name="price" placeholder="値段を入力" value="{{ old('price') }}">
            </div>
            <div class="contact-form__group--error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
        <!-- 商品画像 -->
        <div class="contact-form__group">
            <div class="contact-form__group--label">
                <label for="label-image">商品画像</label>
                <span class="label-require">※必須</span>
                <img id="image-form"  class="image-form" src="" alt="画像フルーツ"style="display: none;">
            </div>
            <div class="contact-form__group--img">
                <!-- <label for="file-upload" class="file-label" style="display: none;">ファイルを選択</label> -->
                <input type="file" id="file-upload" name="image" value="{{ old('image')}}">
            </div>
            <div class="contact-form__group--error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>
        <!-- 季節 -->
        <div class="contact-form__group">
            <div class="contact-form__group--label">
                <label for="season">季節</label>
                <span class="label-require">※必須</span>
                <span class="label-wide">複数選択可能</span>
            </div>
            <div class="season-group__checkbox">
                @foreach ($seasons as $season)
                <input type="checkbox" name="season_id[]" value="{{ $season->id }}"> {{ $season->name }}
                @endforeach
            </div>
            <div class="contact-form__group--error">
                @error('season_id')
                {{ $message }}
                @enderror
            </div>
        </div>
        <!-- 商品説明 -->
        <div class="contact-form__group">
            <div class="contact-form__group--label">
                <label for="description">商品説明</label>
                <span class="label-require">※必須</span>
            </div>
            <div class="contact-form__group--textarea">
                <textarea id="description" name="description" rows="5" cols="40" placeholder="商品の説明を入力"></textarea>
            </div>
            <div class="contact-form__group--error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <!-- 登録 -->
        <div class="contact-form__button">
            <button type="button" class="form-btn__cancel" onclick="location.href='{{ route('products.register') }}'">戻る</button>
            <button type="submit" class="form-btn__submit">登録</button>
        </div>
    </form>
</div>
@endsection

@section('script')
@endsection