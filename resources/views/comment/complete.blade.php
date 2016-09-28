@extends('layouts.master')

@section('pageTitle', 'コメント投稿完了')
@section('pageDescription', 'コメント投稿完了ページです')
@section('pageId', 'add_comment')

@section('container')
<div class="container">
  <div class="form-signin">
    <h2 class="form-signin-heading">コメント投稿完了</h2>
    <p>コメントの投稿が完了しました。</p>
    <a href="/topic/{{ $topic_id }}">コメント投稿したトピックを見る</a>
  </div>
</div>
@endsection
