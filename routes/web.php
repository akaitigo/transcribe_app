<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('upload',UploadController::class);
Route::get('/google', 'App\Http\Controllers\GoogleController@index');

Route::get('/login', function () {return view('login');});
// Route::get('/result/{id}','ResultController@viewResult')->name('result.show');
Route::get('/result', function () {return view('result');});

Route::get('/upload', function () {return view('upload');});

