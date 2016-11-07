@extends('layouts.master')

@section('pageTitle', 'トピック投稿')
@section('pageDescription', 'トピック投稿ページです')
@section('pageId', 'add_topic')

@section('container')
<div class="container">
  <form action="/link/new" method="POST" class="form-signin">
    <h2 class="form-signin-heading">リンク投稿</h2>
    <label for="link">URL</label>
    <input type="text" id="link" name="link" value="{{ old('link') }}" class="form-control" placeholder="URL" autofocus>
    @if ($errors->has('link'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('link') }}</div>
    @endif
    <label for="body">コメント</label>
    <textarea class="form-control" rows="5" id="body" name="body" placeholder="コメント">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('body') }}</div>
    @endif
    <button class="btn btn-lg btn-primary btn-block" type="submit">確認する</button>
    {!! csrf_field() !!}
  </form>
</div>
@endsection
