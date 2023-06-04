@extends('layouts.base')
@section('title', '商品登録')
@section('main')
    <h1 class="page-title">商品登録</h1>
    <div class="form-container">
    <form action="{{ route('products.store') }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="area-msg">
            @include('commons.errors')
        </div>
        <table>
            <tr>
                <td>カテゴリ</td>
                <td>
                    <select name="category_id" class="form-select">
                        <option value="" hidden>選択してください</option>
                        @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>商品名</td>
                <td>
                    <input type="text" name="name" value="{{ old('name') }}" class="create-form">
                </td>
            </tr>
            <tr>
                <td>商品価格（税込）</td>
                <td>
                    <input type="text" name="price" value="{{ old('price') }}" class="create-form">
                </td>
            </tr>
            <tr>
                <td>商品説明</td>
                <td>
                    <textarea name="comment" id="" cols="30" rows="10" style="height:150px" class="create-form"></textarea>
                </td>
            </tr>
            <tr>
                <td>画像1</td>
                <td><input type="file" name="img1_path" id="img1_path" enctype="multipart/form-data"></td>
            </tr>
            <tr>
                <td>画像2</td>
                <td><input type="file" name="img2_path" enctype="multipart/form-data"></td>
            </tr>
            <tr>
                <td>画像3</td>
                <td><input type="file" name="img3_path" enctype="multipart/form-data"></td>
            </tr>
            <tr>
                <td>画像4</td>
                <td><input type="file" name="img4_path" enctype="multipart/form-data"></td>
            </tr>
        </table>

        <button type="submit" class="submit-btn button">商品登録</button>
        <a href="{{ route('products.index') }}" class="transition-btn button">戻る</a>
    </form>
    </div>
@endsection()