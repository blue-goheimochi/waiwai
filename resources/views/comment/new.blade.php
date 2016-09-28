@extends('layouts.master')

@section('pageTitle', 'コメント投稿')
@section('pageDescription', 'コメント投稿ページです')
@section('pageId', 'add_comment')

@section('container')
<div class="container">
  <form action="/comment/new" method="POST" class="form-signin">
    <h2 class="form-signin-heading">コメント投稿</h2>
    <label for="body" class="sr-only">本文</label>
    <textarea class="form-control" rows="5" id="body" name="body" placeholder="本文">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('body') }}</div>
    @endif
    <input type="hidden" id="topic_id" name="topic_id" value="{{ $topic->id }}">
    <button class="btn btn-lg btn-primary btn-block" type="submit">確認する</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
