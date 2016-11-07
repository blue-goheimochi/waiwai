@extends('layouts.master')

@section('pageTitle', 'トップページ')
@section('pageDescription', 'トップページです')
@section('pageId', 'home')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2>最新のトピック</h2>
      <div class="new-topics">
        @forelse($topics as $topic)
        <div class="topic">
          <div class="title"><a href="/topic/{{ $topic->id }}">{{ $topic->title }}</a></div>
          <div class="contents clearfix"><div class="date">{{ $topic->created_at }}</div><div class="body">{{ $topic->body }}</div></div>
        </div>
        @empty
        <p>最新のトピックがありません</p>
        @endforelse
      </div>
    </div>
    <div class="col-sm-4">
      <div class="ad" style="width: 300px; margin: 0 auto 5px;"><div style="width: 290px; height: 240px; background: #f0f8ff; border: 5px solid #483d8b;"></div></div>
      <div class="ad" style="width: 300px; margin: 0 auto 5px;"><div style="width: 290px; height: 240px; background: #ffffe0; border: 5px solid #f0e68c;"></div></div>
    </div>
  </div>
</div>
@endsection