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
    @include('head')
    <div id="field">
        <div id="main" class="container">
            <h1>Upload your video</h1>
            <form action="/upload" method="post"enctype="multipart/form-data">
                @csrf
                <input name="file" type="file" id="file" accept=".mp4" class="form-control"><br>
                <input type="submit" value="送信" class="btn btn-primary">
            </form>
        </div>
    </div>

    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
</body>
</html>
