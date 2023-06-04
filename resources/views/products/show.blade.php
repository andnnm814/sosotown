@extends('layouts.base')
@section('title', '商品詳細')
@section('main')
    <section id="show-main">
        <!-- 商品タイトル -->
        <span class="badge">{{ $product->category->name }}</span>
        <div class="product-title">{{ $product->name }}</div>
        <!-- 商品画像 -->
        <div class="product-img-container">
            <div class="img-main">
                <img src="{{asset('storage/'.$product->img1_path)}}" alt="">
            </div>
            <div class="img-sub">
                <img src="{{asset('storage/'.$product->img2_path)}}" alt="">
                <img src="{{asset('storage/'.$product->img3_path)}}" alt="">
                <img src="{{asset('storage/'.$product->img4_path)}}" alt="">
            </div>
        </div>
        <!-- 商品詳細コメント -->
        <div class="product-detail">
            <p>{{ $product->comment }}</p>
        </div>
        <!-- お気に入り -->
        @if(!$product->isLikedBy(Auth::user()))
            <div class="likes-mark">
                <span class="likes">
                    <i class="fa-regular fa-heart" date-product-id="{{ $product->id }}">お気に入り登録</i>
                </span>
            </div>
        @endif
        <!-- 戻る＆購入ボタン -->
        <div class="product-buy">
            <div class="item-left">
                <a href="{{ route('products.index') }}">＜ TOPへ戻る</a>
            </div>
            <form action="{{ route('products.addCart', $product) }}" method="post" class="item-right">
            @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="number" name="product_quantity" pattern="[1-9][0-9]*" min="1" class="product_quantity" id="product_quantity" placeholder="1" required autofocus>
                <input type="submit" class="buy-btn button" value="カートに入れる">
            </form>
            <div class="item-right">
                <p class="price">¥{{ $product->price }}-</p>
            </div>
        </div>
    
        <!-- 商品編集リンク -->
        <a href="{{ route('products.edit', $product) }}" class="transition-btn button">商品編集</a>

    </section>
@endsection()