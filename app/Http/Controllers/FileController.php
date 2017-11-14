<?php

namespace App\Http\Controllers;

use DB;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public $red = "<meta http-equiv='refresh' content='2;URL=/file'/>";

    public function index(){
      $datas = DB::table('files')
        ->orderBy('updated_at', 'desc')
        ->get();
      return view('upload.file', compact('datas'));
    }

    public function show($id){
      $datas = File::find($id);
      return view('upload.edit', compact('datas'));
    }

    public function store(Request $request)
    {
      if ($request->hasFile('file')) {
        foreach ($request->file as $file) {
          $fileName = $file->getClientOriginalName();
          $fileSize = $file->getClientSize();
          $fileExt  = $file->getClientOriginalExtension();

          //store to file
          $file->storeAs('public/foto', $fileName);

          //store to db
          $fileObject = new File;
          $fileObject->name = $fileName;
          $fileObject->ext = $fileExt;
          $fileObject->status = "not_edited";
          $fileObject->size = $fileSize;
          $fileObject->save();

          echo 'Upload success : '.$fileName.'<br>';
        }
        //redirect
        $msg = $this->red;
      }
      else {
        $msg = 'No file selected '.$this->red;
      }
      return $msg;
    }

    public function download($id){
      $datas = File::find($id);

      if ($datas->status == "edited") {
        $msg = response()->download(storage_path("app/public/foto/".$datas->name.".".$datas->ext));
      }
      else {
        $msg = response()->download(storage_path('app/public/foto/'.$datas->name));
      }

      return $msg;
    }

    public function update(Request $request, $id){
      $datas = File::find($id);
      $tmpOldName = $datas->name;
      $tmpOldStatus = $datas->status;
      $tmpOldExt = $datas->ext;

      $tmpNewName = $request->get('name');
      $tmpNewStatus = $request->get('status');

      if ($tmpOldStatus == "edited") {
        Storage::move(
          "public/foto/".$tmpOldName.".".$tmpOldExt,
          "public/foto/".$tmpNewName.".".$tmpOldExt
        );
        echo "File name changed from ".$tmpOldName.".".$tmpOldExt." to ".$tmpNewName.".".$tmpOldExt;
      }
      else {
        Storage::move(
          "public/foto/".$tmpOldName,
          "public/foto/".$tmpNewName.".".$tmpOldExt
        );
        echo "File name changed from ".$tmpOldName." to ".$tmpNewName.".".$tmpOldExt;
      }

      $datas->name = $tmpNewName;
      $datas->status = $tmpNewStatus;
      $datas->save();

      return $this->red;
    }

    public function destroy($id){
      $datas = File::findOrFail($id);
      $tmpName = $datas->name;
      $tmpExt = $datas->ext;
      $tmpStatus = $datas->status;

      if ($tmpStatus == "edited") {
        Storage::delete("public/foto/".$tmpName.".".$tmpExt);
        echo "File ".$tmpName.".".$tmpExt." deleted";
      }
      else{
        Storage::delete('public/foto/'.$tmpName);
        echo "File ".$tmpName." deleted";
      }

      $datas->delete();
      return $this->red;
    }
}
