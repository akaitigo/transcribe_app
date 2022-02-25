<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function results()
    {
        return $this->belongsToMany(Result::class);
    }
    public static function existsWord($word){
        return self::where('name',$word)->exists();
    }
    public static function wordId($word){
        return self::select('id')->where('name',$word)->first();
    }

}
