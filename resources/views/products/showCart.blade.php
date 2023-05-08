@extends('layouts.base')
@section('title', 'カート')
@section('main')
    <h1 class="page-title">カート</h1>
    <div class="form-container">
        <form action="" method="post" class="form-cart">
        @csrf
        <p class="count-item">カートに入っている商品：</p>
            <div class="cart-item">
                <div class="cart-item-left">
                    <img src="" alt="カート商品">
                </div>
                <div class="cart-item-center">
                    <p class="cart-item-name">商品名</p>
                    <p class="cart-item-price">¥商品価格</p>
                </div>
                <div class="cart-item-right">
                    個
                </div>
                <a href="">カートから削除</a>
            </div>
            <button type="submit" class="submit-btn button">レジへ進む</button>
            <a href="{{ route('products.index') }}" class="transition-btn button">＜ TOPへ戻る</a>
        </form>
@endsection()