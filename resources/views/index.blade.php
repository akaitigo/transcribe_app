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
                @foreach ($files as $file)
                @if($file->id == 1 || $file->id == 3|| $file->id == 9)

                    @if ($file->result->content!=null)
                    <a href="{{route('result.show',$file->id)}}">
                        <div class="item">
                            <div class="item-img" style="background-image: url('{{ Storage::url('image/'.$file->path.'.jpg') }}')">
                                {{-- wordsは後から考える --}}
                                <span class="words">{{($file->result->words[0]->name)}},{{($file->result->words[1]->name)}},{{($file->result->words[2]->name)}}</span>
                                {{-- , {{$result->word[1]}}, {{$result->word[2]}} --}}
                            </div>
                            <span class="date">{{$file->created_at}}</span>
                        </div>
                    </a>
                    @else
                    <a href="{{route('result.show',$file->id)}}">
                        <div class="item">
                            <div class="item-img" style="background-image: url('{{ Storage::url('image/'.$file->path.'.jpg') }}')">
                                {{-- C:\xampp\htdocs\transcribe_app\storage\image\sample-5s.jpg --}}
                            {{-- <div class="item-img" style="background-image: url('{{Storage::url('image/'.$result->path.'.jpg')}}')"> --}}
                                <span class="words">準備中, 準備中, 準備中</span>
                            </div>
                            <span class="date">{{$file->created_at}}</span>
                        </div>
                    </a>
                    @endif
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
    <div class="d-flex justify-content-center">
    {{$files->links()}}
    </div>
</body>
</html>