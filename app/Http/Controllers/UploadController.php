<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
        return view('uploadTest');
    }
    public function store(Request $request){
        //file('file')ファイルの情報のみ確認できる
        //dd($request->file('file'));
        //ファイルの検証
        $request->validate([
            'file' => 'required'
        ]);

        $request->file('file')->store('files');

        echo "upload succes";
        exit;
    }
}
