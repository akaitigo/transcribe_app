<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="Foundation.css">
    <script src="Foundation.js" ></script>
    <title>login - 文字起こし</title>
</head>
<body>
    @include('head')
    <div id="field">
        <div id="main" class="container">
            <form action="" method="post">
                <label for="emIn" class="form-label">メールアドレス:</label>
                <input id="emIn" type="text" class="form-control"><br>

                <label for="pwIn" class="form-label">パスワード:</label>
                <input id="pwIn" type="password" class="form-control"><br>

                <div class="centering">
                    <input type="submit" value="ログイン" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
</body>
</html>
