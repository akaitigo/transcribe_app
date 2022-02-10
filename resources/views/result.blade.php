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
        video {
            width: 80%;
        }

        div#results, div#words {
            display: inline-block;
            text-align: left;
            border: 1px solid black;
            background-color: white;
        }

        div#results {
            width: 80%;
            height: 200px;
            overflow-y: scroll;
            padding: 5px;
        }

        div#words {
            width: calc(100% - 20px);
            height: 100px;
            overflow-y: scroll;
            padding: 10px;
        }

            div#words span {
                border-radius: 60%;
                background-color: lightgray;
                padding: 5px 10px;
            }
    </style>
    <title>result - 文字起こし</title>
</head>
<body>
    @include('head')
    <div id="field">
        <div id="main" class="container">
            <video src="videos/test.mp4" controls></video>
            <hr>
            <h1>文字起こし結果</h1>
            <div id="results">
                起こした内容
            </div>

            <h2>キーワード</h2>
            <div id="words">
                <span>棚</span>
                <span>木材</span>
            </div>
        </div>
    </div>
    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
</body>
</html>
