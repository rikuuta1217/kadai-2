@extends('layouts/app')
@section('title','商品詳細')
@section('content')
<main class="product-detail">
    <div class="product-detail__title--group">
        <a href="/products">商品一覧</a> &gt; {{ $product->name }}
    </div>
    
    <form class="product-form" action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="product-circle">
            <div class="product-circle__image">
                <img id="product-image" src="{{ asset('storage/' . $product->image) }}" >
                    <div class="product-file__wrapper">
                        <label class="file-label" for="file-upload" style="display:none;">ファイルを選択</label>
                        <input type="file" name="image" id="file-upload" onchange="updateImageDisplay()">
                        <p id="file-name" class="file-name" style="display:none;">{{ $product->image }}</p>
                        <input type="hidden" id="new-upload__image" name="new-image" value="{{ $product->image }}">
                    </div>
                    <div class="product-circle__group--error">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
            </div>

            <div class="product-circle__detail">
               <div class="product-circle__name">
                <label for="product-label__name">商品名</label>
                <input type="text" name="name" id="product-label__name" value="{{ $product->name }}">
                    <div class="product-circle__group--error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
               </div>
               <div class="product-circle__price">
                <label for="product-label__price">値段</label>
                <input type="text" name="price" id="product-label__price" value="{{ $product->price }}">
                    <div class="product-circle__group--error">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
               </div>
               <div class="product-circle__season">
                <label for="product-label__season">季節</label>
                    <div class="product-label__season--detail">
                        @foreach ($seasons as $season)
                            <input type="checkbox" name="season_id[]" value="{{ $season->id }}" {{ in_array($season->id, $product->seasons->pluck('id')->toArray()) ? 'checked' : '' }}> {{ $season->name }}
                        @endforeach
                    </div>
                    <div class="product-circle__group--error">
                        @error('season_id')
                            {{ $message }}
                        @enderror
                    </div>
               </div>
               <div class="product-circle__description">
                <label for="description">商品説明</label>
                    <textarea id="description" name="description" rows="4" cols="100" placeholder="商品の説明を入力">{{ $product->description }}</textarea>
                    <div class="product-circle__group--error">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
               </div>
            </div>
        </section>

        <div class="product-form__button">
            <button type="button" name="form-btn__cancel" onclick="location.href='{{ route('products.content') }}'">戻る</button>
            <button type="submit" name="form-btn__submit">変更を保存</button>
        </div>
    </form>

    <form class="product-form__delete" id="form-delete" action="/products/ {{ $product->id }}/delete" method="post" onsubmit="return confirmDelete()">
        @csrf
        @method('delete')
        <button type="submit" class="form-btn__delete">
            <img src="{{ asset('storage/image/gomibako irasuto.jpg') }}" alt="Delete Icon" class="delete-icon">
        </button>
    </form>
</main>

<script>
    function updateImageDisplay() {
        const input = document.getElementById('file-upload');
            // ファイル選択<input type="file">を取得
        const preview = document.getElementById('product-image');
            // 画像を表示する<img>要素を取得
        const fileNameDisplay = document.getElementById('file-name');
            // 選択したファイル名を表示する<p>要素を取得
        const hiddenInput = document.getElementById('new-upload__image');
            // 選択した画像のファイル名を格納する<input type="hidden">を取得する
        const file = input.files[0];
            // ユーザーが選択したファイルを取得
        
        if (file) { //ファイルが選択されているかチェック
            const reader = new FileReader();
            // ブラウザのFileReader APIを使用してファイルを読み込む
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            // ファイルを読み込み、img要素のsrcを変更してプレビューを更新
            reader.readAsDataURL(file);
            // ファイルをデータURL (Base64) として読み込む
            fileNameDisplay.textContent = file.name;
            // 選択したファイル名を<p>に表示
            fileNameDisplay.style.display = "block"
            // ファイル名の<p>を表示
            hiddenInput.value = file.name;
            // 選択したファイル名の名前を<input type="hidden">に保存
        }
    }

    function confirmDelete() {
        return confirm("本当に削除しますか？");
    }
</script>
@endsection