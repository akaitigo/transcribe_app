<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_id',
        'content',
    ];
    public $timestamps = false;
    public function file(){
        return $this->belongsto(File::class);
    }
    public function words(){
        return $this->belongsToMany(Word::class)->withTimestamps();
    }
    public function fileWords($id){
        return $this->words()->wherePivot('file_id',$id);
    }
    public static function storeContent($id,$content){
        Result::where('file_id',$id)->update(['content' => $content]);
    }
}
