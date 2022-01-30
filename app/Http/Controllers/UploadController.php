<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Google\Cloud\Speech\SpeechClient;
use Google\Cloud\Speech\V1p1beta1\SpeechClient;
use Google\Cloud\Speech\V1p1beta1\RecognitionConfig\AudioEncoding;
use Google\Cloud\Speech\V1p1beta1\RecognitionConfig;
use Google\Cloud\Speech\V1p1beta1\RecognitionAudio;

class UploadController extends Controller
{

    public function index(){
        return view('uploadTest');
    }
    public function store(Request $request){
        //file('file')ファイルの情報のみ確認できる
        // dd($request->file('file')->path());
        //ファイルの検証
        $request->validate([
            'file' => 'required'
        ]);
        
        $request->file('file')->store('files');

        echo "upload success";

        //ここから非同期音声認識
        $speechClient =  new SpeechClient([
                'keyFile' => json_decode(file_get_contents(config_path('google.json')), true),
                'languageCode' => 'ja-JP'
            ]);
        try {
            $encoding = AudioEncoding::FLAC;
            $sampleRateHertz = 44100;
            $languageCode = 'ja-JP';
            $model = 'phone_call'; //'default'がデフォルト、'phone_call'が通話モデル
            $config = new RecognitionConfig();
            $config->setEncoding($encoding);
            $config->setSampleRateHertz($sampleRateHertz);
            $config->setLanguageCode($languageCode);
            $config->setModel($model);
            $uri = 'gs://firstrecg/warui.flac';
            $audio = new RecognitionAudio();
            $audio->setUri($uri);
            $operationResponse = $speechClient->longRunningRecognize($config, $audio);
            $operationResponse->pollUntilComplete();
            if ($operationResponse->operationSucceeded()) {
                $result = $operationResponse->getResult();
                // doSomethingWith($result)
                dd($result);
            } else {
                $error = $operationResponse->getError();
                dd($error);
                // handleError($error)
            }

    // // Alternatively:

    // // start the operation, keep the operation name, and resume later
    // $operationResponse = $speechClient->longRunningRecognize($config, $audio);
    // $operationName = $operationResponse->getName();
    // // ... do other work
    // $newOperationResponse = $speechClient->resumeOperation($operationName, 'longRunningRecognize');
    // while (!$newOperationResponse->isDone()) {
    //     // ... do other work
    //     $newOperationResponse->reload();
    // }
    // if ($newOperationResponse->operationSucceeded()) {
    //   $result = $newOperationResponse->getResult();
    //   // doSomethingWith($result)
    // } else {
    //   $error = $newOperationResponse->getError();
    //   // handleError($error)
    // }
} finally {
    $speechClient->close();
}




        

        //ここから同期処理での音声認識、本番では非同期なので使わない
        //
        // $speech = new SpeechClient([
        //     'keyFile' => json_decode(file_get_contents(config_path('google.json')), true),
        //     'languageCode' => 'ja-JP'
        // ]);

        // $results = $speech->recognize(
        //     fopen($request->file('file')->path(), 'r'), [
        //         'languageCode' => 'ja-JP',
        //         'encoding' => 'FLAC',
        //         'sampleRateHertz' => 44100,
        //         'speechContexts' => [
        //             [
        //                 'phrases' => [
        //                     'The Google Cloud Platform',
        //                     'Speech API'
        //             ]
        //         ]
        //     ]
        // ]);

        // // dd($results);
        
        // foreach ($results as $result) {
        //     echo $result->topAlternative()['transcript'] . PHP_EOL;
        // }

        
    }

    

}
