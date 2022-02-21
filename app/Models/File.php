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
        return self::orderBy('created_at','asc')->get();
    }
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];
}
