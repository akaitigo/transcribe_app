<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];
    public function result(){
        return $this->hasOne(Result::class);
    }
    public static function getAllOrderByCreated_at(){
        return self::thisorderBy('created_at','desc')->get();
    }
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];
}
