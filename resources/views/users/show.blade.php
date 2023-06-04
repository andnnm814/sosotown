@extends('layouts.base')
@section('title', 'マイページ')
@section('main')
<h1 class="page-title">マイページ</h1>
    <div class="form-container">
    <form action="{{ route('users.update') }}" method="post" class="form">
        @csrf
        @method('patch')
        <div class="area-msg">
            @include('commons.errors')
        </div>
        <table>
            <tr>
                <td>氏名</td>
                <td><input type="text" name="name" value="{{ old('name', $user->name) }}" class="create-form"></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="email" value="{{ old('email', $user->email) }}" class="create-form"></td>
            </tr>
            <tr>
                <td>郵便番号</td>
                <td><input type="text" name="postcode" value="{{ old('postcode', $user->postcode) }}" class="create-form" maxlength="7"></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><input type="text" name="adress" value="{{ old('adress', $user->adress) }}" class="create-form"></td>
            </tr>
            <tr>
                <td>金融機関名（全角）</td>
                <td><input type="text" name="bankInfo1" class="create-form" maxlength="50" value="{{ old('bankInfo1', $user->bankInfo1) }}"></td>
            </tr>
            <tr>
                <td>支店名（全角）</td>
                <td><input type="text" name="bankInfo2" class="create-form" maxlength="50" value="{{ old('bankInfo2', $user->bankInfo2) }}"></td>
            </tr>
            <tr>
                <td>口座種別</td>
                <td><input type="radio" name="bankInfo3" class="" value="普通">普通</td>
                <td><input type="radio" name="bankInfo3" class="" value="当座">当座</td>
            </tr>
            <tr>
                <td>口座番号（半角数字）</td>
                <td><input type="text" name="bankInfo4" class="create-form" maxlength="10" value="{{ old('bankInfo4', $user->bankInfo4) }}"></td>
            </tr>
            <tr>
                <td>口座名義人名（カナ）</td>
                <td><input type="text" name="bankInfo5" class="create-form" value="{{ old('bankInfo5', $user->bankInfo5) }}"></td>
            </tr>
        </table>

        <button type="submit" class="submit-btn button">更新</button>
        <a href="{{ route('products.index') }}" class="transition-btn button">戻る</a>       
    </form>
    <form onsubmit="return confirm('本当に退会しますか？')" action="{{ route('users.softDelete') }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="del-btn button">退会</button>
    </form>
    </div>

@endsection()