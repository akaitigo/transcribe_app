<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;
use App\Models\Word;
use App\Models\File;

class getKeyWord implements ShouldQueue
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
        $client = new Client(['headers' => ['id' => $this->id]]);
        // $client = new Client(['headers' => ['id' => 1]]);
            $request = new \GuzzleHttp\Psr7\Request('GET', 'https://asia-northeast2-stellar-river-339009.cloudfunctions.net/getKeyfrase');
            $promise = $client->sendAsync($request)->then(function ($response) {
                $result = $response->getBody();
                $s = mb_convert_encoding($result, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');//json形式にエンコード
                $words = json_decode($s,true); //連想配列で読みこむ。jsonのままでいい場合はこの行を削除すればよい。
                if(is_null($words)){
                    getKeyWord::dispatch($this->id)->delay(now()->addMinutes(1));
                }else{
                    foreach($words[0] as $word){
                        preg_match("/'(.*?)'/", $word, $matches);
                        if(!Word::existsWord($word)){
                            
                            Word::create(['name'=>$matches[1],]);
                        }
                        $model = new Word();
                        $file = File::find($this->id);
                        $resultId = $file->result->id;
                        $wordId = Word::wordID($matches[1])->id;
                        $count = 1;
                        $model->results()->attach([$resultId => ['word_id'=>$wordId,'count'=>$count]]);
                        
                    }
               }
            });
            $promise->wait();
    }
}
