<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(){
      return view('upload.upload');
    }

    public function store(Request $request){
      if ($request->hasFile('img')) {
        $request->img->storeAs('public/foto','gambar2.png');
        $msg = 'Upload success';
      }
      else {
        $msg = 'No file selected';
      }
      return $msg;
    }

    public function show(){
      /*$url =  Storage::url('foto/gambar2.png');
      $see = "<img src='$url' alt='gambar'/>";
      return $see;*/

      $test = Storage::size('public/foto/gambar2.png');
      $hai = $test."Byte";
      return $hai;
    }
}
