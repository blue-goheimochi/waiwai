@extends('layouts.master')

@section('pageTitle', 'コメント投稿確認')
@section('pageDescription', 'コメント投稿確認ページです')
@section('pageId', 'add_comment')

@section('container')
<div class="container">
  <form action="/comment/store" method="POST" class="form-signin">
    <h2 class="form-signin-heading">コメント投稿確認</h2>
    <h3>本文</h3>
    <p>{!! nl2br(e($inputs['body'])) !!}</p>
    <input type="hidden" id="body" name="body" value="{{ $inputs['body'] }}">
    <input type="hidden" id="topic_id" name="topic_id" value="{{ $inputs['topic_id'] }}">
    <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="back">戻る</button>
    <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="save">投稿する</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
