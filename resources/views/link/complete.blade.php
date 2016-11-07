@extends('layouts.master')

@section('pageTitle', 'トピック投稿完了')
@section('pageDescription', 'トピック投稿完了ページです')
@section('pageId', 'add_topic')

@section('container')
<div class="container">
  <div class="form-signin">
    <h2 class="form-signin-heading">トピック投稿完了</h2>
    <p>トピックの投稿が完了しました。</p>
    <a href="/topic/{{ $id }}">投稿したトピックを見る</a>
  </div>
</div>
@endsection
