@extends('layouts.base')
@section('title', 'トップページ')
@section('main')
    <div class="main">
        <!-------------- 商品検索 -------------->
        <div class="sidebar">
            <form action="{{ route('products.search') }}" method="get" class="search-box">
                @csrf
                <div class="sidebar-title">商品検索</div>
                <dl>
                    <dt class="search-title">カテゴリ</dt>
                    <dd>
                        <select name="category_id" class="select-box">
                            <option value=""></option>
                            @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ Request::get('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </dd>

                    <dt class="search-title">キーワード</dt>
                    <dd><input type="text" name="keyword" class="input-box" placeholder="" value="{{ Request::get('keyword') }}"></dd>

                    <dt class="search-title">価格帯</dt>
                    <dd>
                        <div>
                            <input type="text" name="min_price" class="input-box" placeholder="円" value="{{ Request::get('min_price') }}">
                            <span class="">〜</span>
                            <input type="text" name="max_price" class="input-box" placeholder="円" value="{{ Request::get('max_price') }}">
                        </div>
                    </dd>

                    <dt class="search-title">並び順</dt>
                    <dd>
                        <select name="sort" class="select-box">
                            <option value="">新しい順</option>
                            <option value="price_asc"{{ Request::get('sort') == 'price_asc' ? ' selected' : '' }}>価格が安い順</option>
                            <option value="price_desc"{{ Request::get('sort') == 'price_desc' ? ' selected' : '' }}>価格が高い順</option>
                        </select>
                    </dd>
                </dl>
                <div>
                    <button type="submit" class="submit-btn button">検索</button>
                </div>
            </form>
            <div>
                <a href="{{ route('products.create') }}" class="transition-btn button">商品登録</a>
            </div>
            <div>
                <a href="/" class="transition-btn button">マイページ</a>
            </div>
        </div>
        
        <!-------------- 商品一覧 -------------->
        <div class="mainbar">
            <div class="panel-list">
                @foreach ($products as $product)
                <a href="{{ route('products.show', $product) }}" class="panel">
                    <div class="panel-head">
                        <img src="{{asset('storage/'.$product->img1_path)}}" alt="{{$product->name}}">
                    </div>
                    <div class="panel-body">
                        <p class="panel-title">{{ $product->name }}
                            <span class="price">¥{{ $product->price }}</span>
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>
@endsection()