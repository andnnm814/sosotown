@extends('layouts.base')
@section('title', 'ログイン')
@section('main')
    <div class="form-container">
    <form action="" method="post" class="form">
        @csrf
            <h2>ログイン</h2>
            <div class="area-msg">
                @include('commons.errors')
            </div>
            <label class="input_form">メールアドレス</label>
            <input class="input-box" type="email" name="email" value="{{ old('email') }}">
            <label for="">パスワード</label>
            <input class="input-box" type="password" name="password">
            <button class="button" type="submit">ログイン</button>
            <a href="/register">会員登録はこちら</a>
        </form>
    </div>

@endsection()