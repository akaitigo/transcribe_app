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
        }

        div.item-img {
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

            div.item-img span {
                background-color: #FFFFFF98;
                position: absolute;
                padding: 5px;
                text-align: left;
            }

            div.item-img span.words {
                top: 0;
                left: 0;
            }

            span.date {
                bottom: 0;
                right: 0;
                font-size: medium;
                display: block;
                text-decoration: none;
                color: black;
            }
    </style>
    <title>index - 文字起こし</title>
</head>
<body>
@include('head')

    <div id="field">
        <div id="main" class="container">
            <div id="items">
                @foreach ($results as $result)
                <a href="{{route('result.show',$result->id)}}">
                    <div class="item">
                        <div class="item-img" style="background-image: url({{asset('storage/images/'.$item->file_path)}});">
                            <span class="words">{{$result->word[0]}}, {{$result->word[1]}}, {{$result->word[2]}}</span>
                        </div>
                        <span class="date">{{$result->date}}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
</body>
</html>
