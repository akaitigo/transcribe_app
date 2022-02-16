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
            width: 100%;
        }

        div#results, div#words {
            display: inline-block;
            text-align: left;
            border: 1px solid black;
            background-color: white;
        }

        div#results {
            width: 90%;
            height: 300px;
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
            <div class="row">
                <div class="col-5">
                    <video src="videos/test.mp4" controls></video>
                    <span>2022/01/24 14:27</span>
                </div>
                <div class="col-7">
                    <h1>文字起こし結果</h1>
                    <div id="results">
                        起こした内容
                    </div>
                </div>
            </div>
            <hr>
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
