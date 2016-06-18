<h1>ログイン</h1>
<form action="/login" method="POST">
  <div>
    <label for="email">メールアドレス</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}">
    @if ($errors->has('email'))
    <div class="errors"><p>{{ $errors->first('email') }}</p></div>
    @endif
  </div>

  <div>
    <label for="password">パスワード</label>
    <input id="password" type="password" name="password">
    @if ($errors->has('password'))
    <div class="errors"><p>{{ $errors->first('password') }}</p></div>
    @endif
  </div>

  <div>
    <label for="remember">
      <input id="remember" type="checkbox" name="remember"{!! old('remember') ? ' checked="checked"' : '' !!} > ログインしたままにする
    </label>

    <button type="submit" class="pure-button">ログイン</button>
  </div>

  {!! csrf_field() !!}
</div>
