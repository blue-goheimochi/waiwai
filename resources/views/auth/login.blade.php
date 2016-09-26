@extends('layouts.master')

@section('pageTitle', 'ログイン')
@section('pageDescription', 'ログインページです')
@section('pageId', 'login')

@section('container')
<div class="container">
  <form action="/login" method="POST" class="form-signin">
    <h2 class="form-signin-heading">ログイン</h2>
    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      @foreach ($errors->all() as $error)
      {{ $error }}
      @endforeach
    </div>
    @endif
    <label for="email" class="sr-only">メールアドレス</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="メールアドレス" required autofocus>
    <label for="password" class="sr-only">パスワード</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="パスワード" required>
    <div class="checkbox">
      <label>
        <input type="checkbox"id="remember" value="remember-me"{!! old('remember') ? ' checked="checked"' : '' !!}> 次回から自動的にログインする
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
