<?php

namespace App\Jobs;

use App\Models\Result;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;

class getTranscribeResult implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        global $k;
        //文字起こし結果を取得するコードを書く
        // $k =strval($this->id);
        $k =$this->id;
        // $k= 1;

        $client = new Client(['headers' => ['id' => $k]]);
        // $client = new Client(['headers' => ['id' => 2]]);
            $request = new \GuzzleHttp\Psr7\Request('GET', 'https://asia-northeast2-stellar-river-339009.cloudfunctions.net/function-5');

            $promise = $client->sendAsync($request)->then(function ($response) {
                global $k;
                $result = $response->getBody();
                $s = mb_convert_encoding($result, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');//json形式にエンコード
                // $s = json_decode($s,true); //連想配列で読みこむ。jsonのままでいい場合はこの行を削除すればよい。
                if($s=='[]'){
                    getTranscribeResult::dispatch($this->id)->delay(now()->addMinutes(1));
                }else{
                    $content = $s;//これに文字起こし結果の文字列を入れる
                    Result::storeContent($this->id,$content);
                // Result::storeContent($this->id,$k);// この行をテーブルに保存する処理に書き換える(resultのcontentに格納するメソッド)
                    getKeyWord::dispatch($this->id);
                }
                
            });
            $promise->wait();
            // getKeyWord::dispatch($this->id)->delay(now()->addMinutes(1));
    }
}
