<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class FileUploadController extends Controller
{
    public function index(){
        return view('file.upload.index');
    }

    public function uploadFile(Request $request){
        // basic validation 
        $validated = $request->validate([
            'name' => 'required|unique:groups|min:4',
            'target_file' => 'required|mimes:txt,csv',
        ]);

        //resolve the file name and location
        $target_file = $request->file('target_file');
        $name_gen = hexdec(uniqid());
        $file_ext = strtolower($target_file->getClientOriginalExtension());
        $file_name = $name_gen . '.' . $file_ext;
        $up_location = 'upload/file/';

         //up image location with file name and ext
         $final_file = $up_location . $file_name;

         //upload action
         $target_file->move($up_location, $file_name);
 
         //save in db
         Group::insert([             
             'name' => $final_file,
         ]);

        //action after uploading a file
        return Redirect()->back()->with('success', 'New File uploaded !');

        // return view('file.upload.process');
    }
}
