<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public $red = "<meta http-equiv='refresh' content='3;URL=/file'/>";

    public function index(){
      $datas = File::all();
      return view('upload.file', compact('datas'));
    }

    public function store(Request $request)
    {
      if ($request->hasFile('file')) {
        foreach ($request->file as $file) {
          $fileName = $file->getClientOriginalName();
          $fileSize = $file->getClientSize();
          //getClientOriginalExtension()

          //store to file
          $file->storeAs('public/foto', $fileName);

          //store to db
          $fileObject = new File;
          $fileObject->name = $fileName;
          $fileObject->size = $fileSize;
          $fileObject->save();

          echo 'Upload success : '.$fileName.'<br>';
        }
        $msg = $this->red;
      }
      else {
        $msg = 'No file selected '.$this->red;
      }
      return $msg;
    }

    public function download($id){
      $datas = File::find($id);
      return response()->download(storage_path('app/public/foto/' . $datas->name));
    }

    public function update(Request $request, $id){
      $datas = File::find($id);
      $tmpName = $request->get('name');
      //$tmpExt = 

      //rename file @dir
      Storage::move('public/foto/'.$datas->name, 'public/foto/'.$tmpName);

      //save to db
      $datas->name = $tmpName;
      $datas->save();

      return redirect()->route('file.home');
    }

    public function show($id){
      $datas = File::find($id);
      return view('upload.edit', compact('datas'));
    }

    public function destroy($id, $name){
      //delete file on storage
      if (Storage::delete('public/foto/'.$name)) {
        //delete file on db
        File::findOrFail($id)->delete();
      }
      return redirect()->route('file.home');
    }
}
