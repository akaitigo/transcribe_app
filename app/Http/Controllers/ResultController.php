<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function viewResult($id){
        //動画、結果、よく使われた言葉がいる
        $file = File::find($id);

        return view('result')->with([
            "file" => $file,
         ]);
    }
}
