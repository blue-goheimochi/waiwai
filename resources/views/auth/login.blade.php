@extends('layouts.master')

@section('pageTitle', 'ログイン')
@section('pageDescription', 'ログインページです')
@section('pageId', 'login')

@section('container')
<div class="container">
  <div class="login-box">
    <form action="/login" method="POST" class="form-signin">
      <h2 class="form-signin-heading">Sample App</h2>
      @if (count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
      </div>
      @endif
      @if (session('message'))
      <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
      @endif
      <label for="email" class="sr-only">メールアドレス</label>
      <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="メールアドレス" autofocus>
      <label for="password" class="sr-only">パスワード</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="パスワード">
      <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">ログイン</button>
      {!! csrf_field() !!}
    </form>
  </div>
</div>
@endsection