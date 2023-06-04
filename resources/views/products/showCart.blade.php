@extends('layouts.base')
@section('title', 'カート')
@section('main')
    <h1 class="page-title">カート</h1>
    <div class="form-container">
        @foreach($cartData as $key => $data)
            <div class="cart-item">
                <div class="cart-row">
                    <img src="{{asset('storage/'.$data['product_image'])}}" class="cart-img">
                </div>
                <div class="cart-row">
                    <p class="cart-item-name">{{ $data['product_name'] }}</p>
                </div>
                <div class="cart-row">
                    <p class="cart-item-price">¥{{ $data['price']}}</p>
                </div>
                <div class="cart-row">
                    {{ $data['session_quantity'] }}個
                </div>
                <div class="cart-row">
                    小計 ¥{{ $data['itemPrice'] }}
                </div>
                <form action="{{ route('products.removeCart') }}" method="post" class="form-cart">
                @csrf
                    <button type="submit" class="cart-row" name="delete_products_id" style="background-color: red; width:10%; color:white; font-size: 15px;">削除</button>
                    <input type="hidden" name="product_id" value="{{ $data['session_product_id'] }}">
                    <input type="hidden" name="product_quantity" value="{{ $data['session_quantity'] }}">
                </form>
            </div>
        @endforeach
        <button type="submit" class="submit-btn button">レジへ進む</button>
        <a href="{{ route('products.index') }}" class="transition-btn button"> 買い物を続ける</a>
    </div>
@endsection()