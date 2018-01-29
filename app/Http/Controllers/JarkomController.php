<?php

namespace App\Http\Controllers;

use DB;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JarkomController extends Controller
{
    public $red = "<meta http-equiv='refresh' content='2;URL=/jarkom'/>";

    public function index(){
      //$datas = File::where('kode_mk', 'C31040315')->first();
      $files = DB::table('files')->where('kode_mk', 'C31040315')->get();
      return view('jarkom.index', compact('files'));
    }

    public function download($id){
      $datas = File::find($id);
      if ($datas->status == "edited") {
        $msg = response()->download(storage_path("app/public/jarkom/".$datas->name.".".$datas->ext));
      }
      else {
        $msg = response()->download(storage_path('app/public/jarkom/'.$datas->name));
      }
      return $msg;
    }
}
