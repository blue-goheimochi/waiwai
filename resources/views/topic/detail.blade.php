@extends('layouts.master')

@section('pageTitle', 'トピック詳細')
@section('pageDescription', 'トピック詳細ページです')
@section('pageId', 'topic_detail')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="date">投稿日時: {{ $topic->created_at }}</div>
      <h1>{{ $topic->title }}</h1>
      <div class="questioner text-right">質問者：{{ $topic->user->name }}</div>
    </div>
    <div class="col-md-8">
      <p class="body">{!! nl2br(e($topic->body)) !!}</p>
      <h2>コメント投稿</h2>
      @if (Auth::guest())
      <div class="comment_no_login"><p class="text-center">コメントするには<a href="/login">ログイン</a>してください</p></div>
      @else
      <div class="comment_btn"><a class="btn btn-outline-secondary btn-block  ">コメントする</a></div>
      @endif
    </div>
    <div class="col-sm-4">
      <div class="ad" style="width: 300px; margin: 0 auto 5px;"><div style="width: 290px; height: 240px; background: #f0f8ff; border: 5px solid #483d8b;"></div></div>
      <div class="ad" style="width: 300px; margin: 0 auto 5px;"><div style="width: 290px; height: 240px; background: #ffffe0; border: 5px solid #f0e68c;"></div></div>
    </div>
  </div>
</div>
@endsection
