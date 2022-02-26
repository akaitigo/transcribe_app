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

        div#texts {
            max-height: 420px;
            overflow-y: scroll;
            background-color: white;
            padding: 0;
            font-size: smaller;
        }

            div#texts table {
                text-align: left;
                
            }

            div#texts table th {
                text-align: center;
            }

        div#results, div#words {
            text-align: left;
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
            /*overflow-y: scroll;*/
            padding: 10px;
        }

            div#words span {
                border-radius: 60%;
                background-color: lightyellow;
                padding: 5px 10px;
            }
    </style>
    <title>result - 文字起こし</title>
</head>
<body>
    @include('head')
    <div id="field">
        @if ($file->result->content!=null)
        <div id="main" class="container">
            <div class="row">
                <div class="col-5">
                    <video src="/storage/videos/{{ $file->path.'.mp4' }}" controls></video>
                    <span>{{$file->created_at}}</span>
                </div>
                <div class="col-7">
                    <h1>文字起こし結果</h1>
                    <div id="results">
                        {{-- {{$file->result->content}} --}}
                        @php
                        $s = $file->result->content;
                        $s = mb_convert_encoding($s, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                        $s = json_decode($s,true);
                        // dd($s);
                        foreach ($s as $value) {
                            if (isset($value['script'])){
                                $time = str_replace('s', '', $value['startTime']);
                                $time = (int)$time;
                                print_r($time);
                                echo($value['script']);
                                echo "<br/>";
                            }               
                        }                       
                        @endphp
                    </div>
                </div>
            </div>
            <hr>
            <h2>キーワード</h2>
            <div id="words">
                @foreach ($file->result->words as $word)
                <span>{{$word->name}}</span>
                @endforeach
            </div>
        </div>
        @else
        <div id="main" class="container">
            <div class="row">
                <div class="col-5">
                    <video src="/storage/videos/{{ $file->path.'.mp4' }}" controls></video>
                    <span>{{$file->date}}</span>
                    <div id="words">
                        <span>準備中</span>
                    </div>
                </div>
                <div id="texts" class="col-7">
                    <table class="table table-striped">
                        <thead>
                            <th>Time</th>
                            <th>Text</th>
                        </thead>
                        <tbody>
                            <!-- #region forで囲ってください -->
                            <tr>
                                <td>00:00</td>
                                <td>ねただいまから総務常任委員会を開会いたします この際 初版の報告を申し上げます 傍聴 は あらかじめ 許可してあります 以上で初版の報告を終わります</td>
                            </tr>
                            <tr>
                                <td>00:30</td>
                                <td>それでは 書簡事務の調査に入ります 本日は 執行部からの報告事項がありませんので 委員の方々から執行部に対し お聞きしたいことがありましたらお願いいたします</td>
                            </tr>
                            <tr>
                                <td>00:30</td>
                                <td>それでは 書簡事務の調査に入ります 本日は 執行部からの報告事項がありませんので 委員の方々から執行部に対し お聞きしたいことがありましたらお願いいたします</td>
                            </tr>
                            <tr>
                                <td>00:30</td>
                                <td>それでは 書簡事務の調査に入ります 本日は 執行部からの報告事項がありませんので 委員の方々から執行部に対し お聞きしたいことがありましたらお願いいたします</td>
                            </tr>
                            <tr>
                                <td>00:30</td>
                                <td>それでは 書簡事務の調査に入ります 本日は 執行部からの報告事項がありませんので 委員の方々から執行部に対し お聞きしたいことがありましたらお願いいたします</td>
                            </tr>
                            <tr>
                                <td>00:30</td>
                                <td>それでは 書簡事務の調査に入ります 本日は 執行部からの報告事項がありませんので 委員の方々から執行部に対し お聞きしたいことがありましたらお願いいたします</td>
                            </tr>
                            <tr>
                                <td>00:30</td>
                                <td>それでは 書簡事務の調査に入ります 本日は 執行部からの報告事項がありませんので 委員の方々から執行部に対し お聞きしたいことがありましたらお願いいたします</td>
                            </tr>
                            <tr>
                                <td>00:30</td>
                                <td>それでは 書簡事務の調査に入ります 本日は 執行部からの報告事項がありませんので 委員の方々から執行部に対し お聞きしたいことがありましたらお願いいたします</td>
                            </tr>
                            <!-- #endregion -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- #region Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- #endregion -->
</body>
</html>
