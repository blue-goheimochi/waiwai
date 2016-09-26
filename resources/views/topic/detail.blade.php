<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>トピック詳細</title>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body id="add_topic">
    <div class="container">
      <div class="form-signin">
        <h2 class="form-signin-heading">トピック詳細</h2>
        <h3>タイトル</h3>
        <p>{{ $topic->title }}</p>
        <h3>本文</h3>
        <p>{!! nl2br(e($topic->body)) !!}</p>
      </div>
    </div>
  </body>
</html>
