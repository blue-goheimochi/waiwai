@extends('layouts.master')

@section('pageTitle', 'ユーザー登録')
@section('pageDescription', 'ユーザー登録ページです')
@section('pageId', 'register')

@section('container')
<div class="container">
  <form action="/register" method="POST" class="form-signin">
    <h2 class="form-signin-heading">ユーザー登録</h2>
    <label for="name" class="sr-only">ユーザーID</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="ユーザー名" autofocus>
    @if ($errors->has('name'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>
    @endif
    <label for="email" class="sr-only">メールアドレス</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="メールアドレス" autofocus>
    @if ($errors->has('email'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
    @endif
    <label for="password" class="sr-only">パスワード</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="パスワード">
    <label for="password_confirmation" class="sr-only">パスワード確認</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="パスワード確認">
    @if ($errors->has('password'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
    @endif
    <button class="btn btn-lg btn-primary btn-block" type="submit">登録</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
