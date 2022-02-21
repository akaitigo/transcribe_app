<?php

namespace App\Http\Controllers;

use App\Jobs\getTranscribeResult;
use App\Models\File;
use App\Models\Result;
use Facade\FlareClient\Flare;
use FFMpeg\Format\Audio\Flac;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function index(){
        return view('uploadTest');
    }

    public function store(Request $request){
        //file('file')ファイルの情報のみ確認できる
        // dd($request->file('file'));
        //ファイルの検証
        $request->validate([
            'file' => 'required|mimetypes:video/mp4'
        ]);
        $file = $request->file('file');
        $filename = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('videos',$filename);
        $newname = str_replace('.mp4','',$filename);
        File::create([
            'name' => $newname,
            'path' => $newname,
        ]);
        $id = File::where('name',$newname)->latest('created_at')->first()->id;
        Result::create(['file_id' => $id]);
        // $format = new \FFMpeg\Format\Audio\Flac();
        // $format->setAudioChannels(1)->setAudioKiloBitrate(283);
        $flacname = '['.$id.']'.$newname.'.flac';
        FFMpeg::fromDisk('videos')->open($filename)->export()->inFormat((new \FFMpeg\Format\Audio\Flac)->setAudioChannels(1)->setAudioKiloBitrate(283))->toDisk('flac')->save($flacname);
        FFMpeg::fromDisk('videos')->open($filename)->getFrameFromSeconds(1)->export()->toDisk('image')->save($newname.'.jpg');
        $file =Storage::disk('flac')->get($flacname);
        // // プロジェクトIDを入力
        $projectId = 'stellar-river-339009';
        // 認証鍵までのディレクトリを入力
        $auth_key = config_path('google.json');
        // バケットの名前を入力
        $bucket_name = 'firstrecg';
        // ファイルのディレクトリパスを入力
        $path =storage_path('flac/'.$flacname);
        //C:\xampp\htdocs\transcribe_app\storage\app\flac\[18]sample-5s.flac
        $storage = new StorageClient([
        'projectId' => $projectId,
        'keyFile' => json_decode(file_get_contents($auth_key, TRUE), true)
        ]);

        $bucket = $storage->bucket($bucket_name);
        $bucket->upload(
            fopen("{$path}", 'r'),
        // $options
        );
        getTranscribeResult::dispatch($id);
        return redirect()->route('index');
        // echo "[{$path}]のアップロード完了";

    }


}
