<?php

namespace App\Http\Controllers;

use DB;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public $red = "<meta http-equiv='refresh' content='2;URL=/files'/>";

    public function index(){
      return view('file.index');
    }

    public function create(){
        return view('file.store');
    }

    public function show($id){
      $datas = File::find($id);
      return view('file.edit', compact('datas'));
    }

    public function store(Request $request)
    {
      if ($request->hasFile('file')) {
        foreach ($request->file as $file) {
          $fileName = $file->getClientOriginalName();
          $fileExt  = $file->getClientOriginalExtension();
          $fileSize = $file->getClientSize();
          $getAssistant = $file->get('assistant');
          $getKodemk = $file->get('kode_mk');

          switch ($getKodemk) {
            case 'C31040315':
              $saveTo = "jarkom";
              break;
            case 'C31040311':
              $saveTo = "sbd";
              break;
            case 'C31040203':
              $saveTo = "pv";
              break;
            case 'C31040206':
              $saveTo = "pbo";
              break;
            case 'C31040216':
              $saveTo = "pc";
              break;
            case 'C31040309':
              $saveTo = "tekan";
              break;
            case 'C31040306':
              $saveTo = "simpel";
              break;
            case 'C31041403':
              $saveTo = "rpw";
              break;
            default:
              $saveTo = "";
              break;
          }

          //store to file
          $file->storeAs('public/'.$saveTo, $fileName);

          //store to db
          $fileObject = new File;
          $fileObject->name = $fileName;
          $fileObject->ext = $fileExt;
          $fileObject->status = "not_edited";
          $fileObject->size = $fileSize;
          $fileObject->user_id = $getAssistant;
          $fileObject->kode_mk = $getKodemk;
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

    public function update(Request $request, $id){
      $datas = File::find($id);
      $tmpOldName = $datas->name;
      $tmpOldStatus = $datas->status;
      $tmpOldExt = $datas->ext;

      $tmpNewName = $request->get('name');
      $tmpNewStatus = $request->get('status');
      $getAssistant = $request->get('assistant');
      $getKodemk = $request->get('kode_mk');

      switch ($getKodemk) {
        case 'C31040315':
          $saveTo = "jarkom";
          break;
        case 'C31040311':
          $saveTo = "sbd";
          break;
        case 'C31040203':
          $saveTo = "pv";
          break;
        case 'C31040206':
          $saveTo = "pbo";
          break;
        case 'C31040216':
          $saveTo = "pc";
          break;
        case 'C31040309':
          $saveTo = "tekan";
          break;
        case 'C31040306':
          $saveTo = "simpel";
          break;
        case 'C31041403':
          $saveTo = "rpw";
          break;
        default:
          $saveTo = "";
          break;
      }

      if ($tmpOldStatus == "edited") {
        Storage::move(
          "public/".$saveTo."/".$tmpOldName.".".$tmpOldExt,
          "public/".$saveTo."/".$tmpNewName.".".$tmpOldExt
        );
        echo "File name changed from ".$tmpOldName.".".$tmpOldExt." to ".$tmpNewName.".".$tmpOldExt;
      }
      else {
        Storage::move(
          "public/".$saveTo."/".$tmpOldName,
          "public/".$saveTo."/".$tmpNewName.".".$tmpOldExt
        );
        echo "File name changed from ".$tmpOldName." to ".$tmpNewName.".".$tmpOldExt;
      }

      $datas->name = $tmpNewName;
      $datas->status = $tmpNewStatus;
      $datas->user_id = $getAssistant;
      $datas->kode_mk = $getKodemk;
      $datas->save();

      return $this->red;
    }

    public function destroy($id){
      $datas = File::findOrFail($id);
      $tmpName = $datas->name;
      $tmpExt = $datas->ext;
      $tmpStatus = $datas->status;
      $tmpKodemk = $datas->kode_mk;

      switch ($tmpKodemk) {
        case 'C31040315':
          $dir = "jarkom";
          break;
        case 'C31040311':
          $dir = "sbd";
          break;
        case 'C31040203':
          $dir = "pv";
          break;
        case 'C31040206':
          $dir = "pbo";
          break;
        case 'C31040216':
          $dir = "pc";
          break;
        case 'C31040309':
          $dir = "tekan";
          break;
        case 'C31040306':
          $dir = "simpel";
          break;
        case 'C31041403':
          $dir = "rpw";
          break;
        default:
          $dir = "";
          break;
      }

      if ($tmpStatus == "edited") {
        Storage::delete("public/".$dir."/".$tmpName.".".$tmpExt);
        echo "File ".$tmpName.".".$tmpExt." deleted";
      }
      else{
        Storage::delete("public/".$dir."/".$tmpName);
        echo "File ".$tmpName." deleted";
      }

      $datas->delete();
      return $this->red;
    }

    /*
    catatan:
    $saveTo = DB::table('files')
                    ->join('matakuliahs', 'files.kode_mk', '=', 'matakuliahs.kode_mk')
                    ->select('')*/
}
