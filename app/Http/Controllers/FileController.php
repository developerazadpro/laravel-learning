<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;

class FileController extends Controller
{
    /*
    01. File should be stored in storate folder(secure) not in public folder(Not secure).
    02. Check the config/filesystems.php file
    03. local means inside app directory, public means app/public dir in storage folder. Use app/public/ folder to store file
    04. Change .env file FILESYSTEM_DISK to public to store in storage/app/public folder
    05. Link storage dir with root public dir to access publicly by 'php artisan storage:link'
     */

     public function file(){
        return view('file');
     }

     public function fileUpload(Request $request){
        $request->validate([
            'profileImage' => ['required', 'max:200', 'mimes:png,jpg,jpeg']
        ]);
        // Get uploaded file
        $profileImage = $request->file('profileImage');

        // Generate a unique filename with extension
        //$newProfileImage = uniqid().'.'.$profileImage->getClientOriginalExtension();
        $newProfileImage = 'myphoto'.'.'.$profileImage->getClientOriginalExtension();

        // store file in 'Storage/app/public/upload' (ensure 'public' disk is configured)
        $path = $profileImage->storeAs('upload', $newProfileImage, 'public');

        return response()->json([
            'path' => $path,
            'filename' => $newProfileImage
        ]);
     }
     public function fileDelete(Request $request){
        // method 1 (recommended)
        //Storage::delete('/upload/myphoto.jpg');

        // method 2
        //File::delete(storage_path('/app/public/upload/myphoto.jpg'));

        // method 3
        unlink(storage_path('/app/public/upload/myphoto.jpg'));

        return response()->json([
            'status' => '200',
            'message' => 'File deleted successful.'
        ]);
     }

     public function fileDownload(Request $request){
        return redirect()->download(public_path('/storage/upload/myphoto.png'));
     }
}
