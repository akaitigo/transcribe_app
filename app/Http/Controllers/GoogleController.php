<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    public function index () 
    {

        $client = new Client();

        //function-4では一回取得した文字起こし結果は次回以降取得できない。本番環境用。
        // $request = new \GuzzleHttp\Psr7\Request('GET', 'https://asia-northeast2-stellar-river-339009.cloudfunctions.net/function-4');

        //function-5では何回でも同じ結果を得られる。開発用
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://asia-northeast2-stellar-river-339009.cloudfunctions.net/function-5');

        $promise = $client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
            echo($result);

        });

        $promise->wait();
        
    }


}
