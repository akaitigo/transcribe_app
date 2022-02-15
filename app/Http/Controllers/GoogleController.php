<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    public function index () 
    {

        
        function getScript($id){
            $client = new Client();
            $request = new \GuzzleHttp\Psr7\Request('GET', 'https://asia-northeast2-stellar-river-339009.cloudfunctions.net/function-5');
            $promise = $client->sendAsync($request)->then(function ($response) {
                $result = $response->getBody();
                $s = mb_convert_encoding($result, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');//json形式にエンコード
                
                $s = json_decode($s,true); //連想配列で読みこむ。jsonのままでいい場合はこの行を削除すればよい。

                print_r($s); // この行をテーブルに保存する処理に書き換える
            });
            $promise->wait();
        }

        function getKeyfrase($id){
            $client = new Client();
            $request = new \GuzzleHttp\Psr7\Request('GET', 'https://asia-northeast2-stellar-river-339009.cloudfunctions.net/getKeyfrase');
            $promise = $client->sendAsync($request)->then(function ($response) {
                $result = $response->getBody();
                $s = mb_convert_encoding($result, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');//json形式にエンコード
                
                $s = json_decode($s,true); //連想配列で読みこむ。jsonのままでいい場合はこの行を削除すればよい。

                print_r($s); //この行をテーブルに保存する処理に書き換える
            });
            $promise->wait();
        }

        //関数の実行
        $id = 1; //idから該当のファイルを取得する機能は未実装。とり急ぎ形だけ記述
        getScript($id);
        getKeyfrase($id);
        
    }


}
