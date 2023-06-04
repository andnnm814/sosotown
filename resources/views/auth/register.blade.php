@extends('layouts.base')
@section('title', '会員登録')
@section('main')
    <div class="form-container">
        <form action="" method="post" class="form">
        @csrf
            <h2>会員登録</h2>
            <div class="area-msg">
                @include('commons.errors')
            </div>
            <label for="">氏名</label>
            <input class="input-box" type="text" name="name" value="{{ old('name') }}">
            <label>メールアドレス</label>
            <input class="input-box" type="email" name="email" value="{{ old('email') }}">
            <label class="" for="">パスワード</label>
            <input class="input-box" type="password" name="password" value="{{ old('password') }}">
            <label for="">パスワード再入力</label>
            <input class="input-box" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
            <button class="button" type="submit">会員登録</button>
        </form>
    </div>
@endsection()