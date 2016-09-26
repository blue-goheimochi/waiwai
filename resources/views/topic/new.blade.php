<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>トピック投稿</title>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body id="add_topic">
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
  </body>
</html>
