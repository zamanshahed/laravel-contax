<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileGroupController;
use App\Http\Controllers\FileUploadController;

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
    return view('welcome');
});

//file upload
Route::get('/file/upload', [FileUploadController::class, 'index']);

//file group
Route::get('/file/group', [FileGroupController::class, 'index']);