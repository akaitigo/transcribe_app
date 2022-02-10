<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Foundation.css')}}">
    <script src="{{asset('Foundation.js')}}" ></script>
    <style>
        form {
            text-align: right;
        }

        /* form input[type=file] {
            width: 100%;
            margin-bottom: 50px;
            border: 1px solid black;
            background-color: white;
        } */
    </style>
    <title>submit - 文字起こし</title>
</head>
<body>
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
                        <a href="submit">投稿</a>
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

    <div id="field">
        <div id="main" class="container">
            <h1>動画ファイルをアップロード</h1>
            <form action="" method="post">
                <input name="data" type="file" class="form-control"><br>
                <input type="submit" value="送信" class="btn btn-primary">
            </form>
        </div>
    </div>

    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
</body>
</html>