@extends('layouts.master')

@section('pageTitle', 'リンク投稿確認')
@section('pageDescription', 'リンク投稿確認ページです')
@section('pageId', 'add_topic')

@section('container')
<div class="container">
  <form action="/link/store" method="POST" class="form-signin">
    <h2 class="form-signin-heading">トピック投稿確認</h2>
    <h3>URL</h3>
    <p>{{ $inputs['link'] }}</p>
    <h3>コメント</h3>
    <p>{!! nl2br(e($inputs['body'])) !!}</p>
    <input type="hidden" id="link" name="link" value="{{ $inputs['link'] }}">
    <input type="hidden" id="body" name="body" value="{{ $inputs['body'] }}">
    <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="back">戻る</button>
    <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="save">投稿する</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
