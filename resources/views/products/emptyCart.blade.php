@extends('layouts.base')
@section('title', 'カート')
@section('main')
<h1 class="page-title">カート</h1>
<div class="form-container">
    <p>カートに商品はありません</p>
</div>
<a href="{{ route('products.index') }}" class="transition-btn button"> 買い物を続ける</a>
@endsection()