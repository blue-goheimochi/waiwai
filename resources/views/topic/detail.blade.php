@extends('layouts.master')

@section('pageTitle', 'トピック詳細')
@section('pageDescription', 'トピック詳細ページです')
@section('pageId', 'add_topic')

@section('container')
<div class="container">
  <div class="form-signin">
    <h2 class="form-signin-heading">トピック詳細</h2>
    <h3>タイトル</h3>
    <p>{{ $topic->title }}</p>
    <h3>本文</h3>
    <p>{!! nl2br(e($topic->body)) !!}</p>
  </div>
</div>
@endsection
