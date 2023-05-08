@extends('layouts.base')
@section('title', 'ログイン')
@section('main')
    <div class="form-container">
        <form action="" method="post" class="form">
        @csrf
            <h2>ログイン</h2>
            <div class="area-msg">
                <p></p>
            </div>
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}">
            <label for="">パスワード</label>
            <input type="password" name="password">
            <button type="submit">ログイン</button>
        </form>
    </div>
@endsection()