@extends('layouts.base')
@section('title', 'お気に入り商品')
@section('main')
    <h1 class="page-title">お気に入り商品</h1>
    <div class="form-container">
        @foreach($likeProducts as $likeProduct)
            <div class="cart-item">
                <a  class="liked-panel" href="{{ route('products.show', $likeProduct) }}">
                    <div class="cart-row">
                        <img src="{{asset('storage/'.$likeProduct->img1_path)}}" class="cart-img">
                    </div>
                    <div class="cart-row">
                        <p class="cart-item-name">{{ $likeProduct->name }}</p>
                    </div>
                    <div class="cart-row">
                        <p class="cart-item-price">¥{{ $likeProduct->price }}</p>
                    </div>
                </a>
            </div>
        @endforeach
        <button type="submit" class="submit-btn button">レジへ進む</button>
        <a href="{{ route('products.index') }}" class="transition-btn button"> 買い物を続ける</a>
    </div>
@endsection()