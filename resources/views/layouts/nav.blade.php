<nav class="navbar navbar-fixed-top navbar-light bg-faded">
  <a class="navbar-brand navbar-toggleable-xs" href="/">Sample App</a>
  <button class="navbar-toggler hidden-sm-up pull-xs-right" type="button" data-toggle="collapse" data-target="#toggleMenu" aria-controls="toggleMenu" aria-expanded="false" aria-label="Toggle navigation">
    &#9776;
  </button>
  <div class="collapse navbar-toggleable-xs pull-sm-right pull-md-right pull-lg-right pull-xl-right pull-xs-left" id="toggleMenu">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/link/new">リンク投稿</a>
      </li>
      @if (Auth::guest())
      <li class="nav-item">
        <a class="nav-link" href="/register">ユーザー登録</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login">ログイン</a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="/logout">ログアウト</a>
      </li>
      @endif
    </ul>
  </div>
</nav>