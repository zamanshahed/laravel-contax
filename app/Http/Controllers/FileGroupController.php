<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileGroupController extends Controller
{
    public function index(){
        return view('file.group.index');
    }
}
