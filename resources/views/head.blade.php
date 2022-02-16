@section('head')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand btn" href="/">サービス名</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">メニュー</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/">一覧</a></li>
                            <li><a class="dropdown-item" href="/upload">投稿</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="navbar-text btn" href="/login">
                    ログイン名
                </a>
            </div>
        </div>
    </nav>
</header>
