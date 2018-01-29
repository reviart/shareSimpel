<?php
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    public function index(){
      return view('tugas_mahasiswa');
    }

    public function store(Request $request)
    {
      $nim  = $request->get('nim');
      $nama = $request->get('nama');
      $matakuliah = $request->get('matakuliah');
      $kelas  = $request->get('kelas');
      $fileName = $nim+"_"+$nama+"_"+$matakuliah+"_"+$kelas;
      $request->storeAs('public/tugasmhs', $fileName);
      echo "success upload";
      $msg = "<meta http-equiv='refresh' content='2;URL=/files'/>";      
      return $msg;
    }
}
