@extends('layouts.base')
@section('title', '商品編集')
@section('main')
<h1 class="page-title">商品編集</h1>
    <div class="form-container">
    <form action="{{ route('products.update', $product) }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="area-msg">
            "金額は入力必須です"
        </div>
        <table>
            <tr>
                <td>カテゴリ</td>
                <td>
                    <select name="category_id" class="form-select">
                        <option value="{{ $product->category->id }}" hidden>{{ $product->category->name }}</option>
                        @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>商品名</td>
                <td>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="create-form">
                </td>
            </tr>
            <tr>
                <td>商品価格（税込）</td>
                <td>
                    <input type="text" name="price" value="{{ old('price', $product->price) }}" class="create-form">
                </td>
            </tr>
            <tr>
                <td>商品説明</td>
                <td>
                    <textarea name="comment" id="" cols="30" rows="10" style="height:150px" class="create-form">{{ old('comment', $product->comment) }}</textarea>
                </td>
            </tr>
            <tr>
                <td>画像1</td>
                <td><input type="file" name="img1_path" id="img1_path" enctype="multipart/form-data"></td>
            </tr>
            <tr>
                <td><img src="{{asset('storage/img/'.$product->img1_path)}}" alt="" style="width: 100px;"></td>
            </tr>
            <tr>
                <td>画像2</td>
                <td><input type="file" name="img2_path" id="img2_path" enctype="multipart/form-data"></td>
            </tr>
            <tr>
                <td>画像3</td>
                <td><input type="file" name="img3_path" id="img3_path" enctype="multipart/form-data"></td>
            </tr>
            <tr>
                <td>画像4</td>
                <td><input type="file" name="img4_path" id="img4_path" enctype="multipart/form-data"></td>
            </tr>
        </table>

        <button type="submit" class="submit-btn button">更新</button>
        <a href="{{ route('products.show', $product) }}" class="transition-btn button">戻る</a>
    </form>
    <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('products.destroy', $product) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="del-btn button">削除</button>
    </form>
    </div>

@endsection()