@section('head')
<header>
    <div class="row">
        <div class="col-auto">
            <a href="index">
                <div class="headerBut">
                    サービス名
                </div>
            </a>
        </div>
        <div class="col-auto">
            <div class="headerBut" onclick="shMenu()">
                メニュー

                <div id="menu" style="display: none;">
                    <a href="index">一覧</a>
                    <div class="hor_divider"></div>
                    <a href="upload">投稿</a>
                </div>
            </div>
        </div>
        <div class="col"></div>
        <div class="col-auto">
            <div id="loginName">
                <a href="login">
                ログイン名
                </a>
            </div>
        </div>
    </div>
</header>
