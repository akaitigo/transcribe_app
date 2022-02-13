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
    public function Result(){
        return $this->hasOne('App\Result');
    }
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];
}
