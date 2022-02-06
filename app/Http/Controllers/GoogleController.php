<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\PubSub\PubSubClient;
use Google\CloudFunctions\FunctionsFramework;
use Psr\Http\Message\ServerRequestInterface;
use Google\Cloud\Functions\V1\CloudFunctionsServiceClient;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    public function index () 
    {

        $client = new Client();

        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://asia-northeast2-stellar-river-339009.cloudfunctions.net/function-4');

        $promise = $client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
            echo($result);

        });

        $promise->wait();
        
    }


}
