<?php

namespace App\Http\Controllers;

use App\Models\File;
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
    // public function store(Request $request){
    //     //file('file')ファイルの情報のみ確認できる
    //     // dd($request->file('file')->path());
    //     //ファイルの検証
    //     $request->validate([
    //         'file' => 'required'
    //     ]);

    //     // $request->file('file')->store('files');

    //     echo "upload success";

    //     // // プロジェクトIDを入力
    //     $projectId = 'stellar-river-339009';
    //     // 認証鍵までのディレクトリを入力
    //     $auth_key = config_path('google.json');
    //     // バケットの名前を入力
    //     $bucket_name = 'firstrecg';
    //     // ファイルのディレクトリパスを入力
    //     $path = $request->file('file')->path();


    //     $storage = new StorageClient([
    //     'projectId' => $projectId,
    //     'keyFile' => json_decode(file_get_contents($auth_key, TRUE), true)
    //     ]);

    //     $bucket = $storage->bucket($bucket_name);


    //     $bucket->upload(
    //     fopen("{$path}", 'r'),
    //     // $options
    //     );

    //     echo "[{$path}]のアップロード完了";



    // }
    //中山がいじったの↓
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
        $id = File::where('name',$newname)->get();
        $newname = '['.$id.']'.$newname.'.flac';
        // dd(FFMpeg::fromDisk('videos')->open($filename),$file);
        FFMpeg::fromDisk('videos')->open($filename)->export()->toDisk('flac')->inFormat(new \FFMpeg\Format\Audio\Flac)->save($newname);
        // dd(Storage::disk('flac')->get($newname));
        $file =Storage::disk('flac')->get($newname);
        // // プロジェクトIDを入力
        $projectId = 'stellar-river-339009';
        // 認証鍵までのディレクトリを入力
        $auth_key = config_path('google.json');
        // バケットの名前を入力
        $bucket_name = 'firstrecg';
        // ファイルのディレクトリパスを入力
        // $path = $request->file('file')->path();
        $path = $file;

        $storage = new StorageClient([
        'projectId' => $projectId,
        'keyFile' => json_decode(file_get_contents($auth_key, TRUE), true)
        ]);

        $bucket = $storage->bucket($bucket_name);


        $bucket->upload(
        fopen("{$path}", 'r'),
        // $options
        );

        echo "[{$path}]のアップロード完了";



    }


}
