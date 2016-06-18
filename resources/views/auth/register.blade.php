<h1>ユーザー登録</h1>
<form action="/register" method="POST">
  <div>
    <label for="name">ユーザー名</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
    <div class="errors"><p>{{ $errors->first('name') }}</p></div>
    @endif
  </div>

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
    <label for="password_confirmation">パスワード確認</label>
    <input id="password_confirmation" type="password" name="password_confirmation">
    @if ($errors->has('password_confirmation'))
    <div class="errors"><p>{{ $errors->first('password_confirmation') }}</p></div>
    @endif
  </div>

  <div>
    <button type="submit">登録</button>
  </div>

  {!! csrf_field() !!}
</form>
