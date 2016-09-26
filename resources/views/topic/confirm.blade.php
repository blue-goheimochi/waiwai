@extends('layouts.master')

@section('pageTitle', 'トピック投稿確認')
@section('pageDescription', 'トピック投稿確認ページです')
@section('pageId', 'add_topic')

@section('container')
<div class="container">
  <form action="/topic/store" method="POST" class="form-signin">
    <h2 class="form-signin-heading">トピック投稿確認</h2>
    <h3>タイトル</h3>
    <p>{{ $inputs['title'] }}</p>
    <h3>本文</h3>
    <p>{!! nl2br(e($inputs['body'])) !!}</p>
    <input type="hidden" id="title" name="title" value="{{ $inputs['title'] }}">
    <input type="hidden" id="body" name="body" value="{{ $inputs['body'] }}">
    <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="back">戻る</button>
    <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="save">投稿する</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
