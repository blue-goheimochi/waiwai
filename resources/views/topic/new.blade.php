@extends('layouts.master')

@section('pageTitle', 'トピック投稿')
@section('pageDescription', 'トピック投稿ページです')
@section('pageId', 'add_topic')

@section('container')
<div class="container">
  <form action="/topic/new" method="POST" class="form-signin">
    <h2 class="form-signin-heading">トピック投稿</h2>
    <label for="title" class="sr-only">タイトル</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="タイトル" autofocus>
    @if ($errors->has('title'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('title') }}</div>
    @endif
    <label for="body" class="sr-only">本文</label>
    <textarea class="form-control" rows="5" id="body" name="body" placeholder="本文">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('body') }}</div>
    @endif
    <button class="btn btn-lg btn-primary btn-block" type="submit">確認する</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
