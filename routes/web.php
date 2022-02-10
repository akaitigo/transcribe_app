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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('upload',UploadController::class);
Route::get('/google', 'App\Http\Controllers\GoogleController@index');

Route::get('/', function () {return view('head');});
Route::get('/index', function () {return view('index');});
Route::get('/login', function () {return view('login');});
Route::get('/result', function () {return view('result');});
Route::get('/submit', function () {return view('submit');});
Route::get('/upload2', function () {return view('upload');});


