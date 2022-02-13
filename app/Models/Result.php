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
        return $this->belongsto('App\File');
    }
}
