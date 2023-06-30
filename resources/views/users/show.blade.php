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
                <td><input type="text" name="post_code" value="{{ old('post_code', $user->post_code) }}" class="create-form" maxlength="7"></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><input type="text" name="adress" value="{{ old('adress', $user->adress) }}" class="create-form"></td>
            </tr>
            <tr>
                <td>金融機関名（全角）</td>
                <td><input type="text" name="financial_institution" class="create-form" maxlength="50" value="{{ old('financial_institution', $user->financial_institution) }}"></td>
            </tr>
            <tr>
                <td>支店名（全角）</td>
                <td><input type="text" name="branch_name" class="create-form" maxlength="50" value="{{ old('branch_name', $user->branch_name) }}"></td>
            </tr>
            <tr>
                <td>口座種別</td>
                <td><input type="radio" name="account_type" class="" value="普通">普通</td>
                <td><input type="radio" name="account_type" class="" value="当座">当座</td>
            </tr>
            <tr>
                <td>口座番号（半角数字）</td>
                <td><input type="text" name="account_number" class="create-form" maxlength="10" value="{{ old('account_number', $user->account_number) }}"></td>
            </tr>
            <tr>
                <td>口座名義人名（カナ）</td>
                <td><input type="text" name="nominee" class="create-form" value="{{ old('nominee', $user->nominee) }}"></td>
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