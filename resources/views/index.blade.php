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
        div#items a {
            font-size: 0;
        }

        div.item {
            display: inline-block;
            width: 250px;
            height: 140px;
            position: relative;
            background-size: cover;
            margin: 10px;
            text-decoration: none;
            color: black;
            font-size: medium;
        }

            div.item span {
                background-color: #FFFFFF98;
                position: absolute;
                padding: 5px;
            }

            div.item span.words {
                top: 0;
                left: 0;
            }

            div.item span.date {
                bottom: 0;
                right: 0;
            }
    </style>
    <title>index - 文字起こし</title>
</head>
<body>
@include('head')

    <div id="field">
        <div id="main" class="container">
            <div id="items">
                <a href="result">
                    <div class="item" style="background-image: url(imgs/test0.jpg);">
                        <span class="words">柵, 木材</span>
                        <span class="date">2022/01/24 14:27</span>
                    </div>
                </a>

                <a href="">
                    <div class="item" style="background-image: url(imgs/test1.jfif);">
                        <span class="words">かわいい, ちっちゃい</span>
                        <span class="date">2022/01/27 10:07</span>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
</body>
</html>
