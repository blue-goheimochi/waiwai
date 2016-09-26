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
      <form action="/topic/store" method="POST" class="form-signin">
        <h2 class="form-signin-heading">トピック投稿</h2>
        <h3>タイトル</h3>
        <p>{{ $inputs['title'] }}</p>
        <h3>本文</h3>
        <p>{!! nl2br(e($inputs['body'])) !!}</p>
        <input type="hidden" id="title" name="title" value="{{ $inputs['title'] }}">
        <input type="hidden" id="body" name="body" value="{{ $inputs['body'] }}">
        <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="back">戻る</button>
        <button class="btn btn-lg btn-primary btn-block" name="action" type="submit" value="save">投稿する</button>
        {!! csrf_field() !!}
      </form>
    </div>
  </body>
</html>
