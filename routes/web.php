<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileGroupController;
use App\Http\Controllers\FileUploadController;
use App\Models\User;
use App\Models\FileGroup;
use App\Models\BlockList;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('welcome');
});

//upload file
Route::middleware(['auth:sanctum', 'verified'])->get('/file/upload', [FileUploadController::class, 'index'])->name('upload');
//upload process
Route::middleware(['auth:sanctum', 'verified'])->post('/file/process', [FileUploadController::class, 'uploadFile'])->name('file.process');

//file group
Route::middleware(['auth:sanctum', 'verified'])->get('/file/group', [FileGroupController::class, 'index'])->name('group');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //get all users from DB
    $users = User::all();
    $groups = FileGroup::all();
    $block_list = BlockList::all();
    return view('dashboard', compact('users', 'groups', 'block_list'));
})->name('dashboard');
