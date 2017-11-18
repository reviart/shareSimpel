<?php

namespace App\Http\Controllers;

use DB;
use App\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatakuliahController extends Controller
{
    public $red = "<meta http-equiv='refresh' content='2;URL=/matakuliah'/>";

    public function index(){
      $datas = Matakuliah::all();
      return view('matakuliah.index', compact('datas'));
      //return $datas;
    }

    public function create(){
        return view('matakuliah.store');
    }

    public function show($kode_mk){
      $datas = Matakuliah::where('kode_mk', $kode_mk)->first();
      return view('matakuliah.edit', compact('datas'));
    }

    public function store(Request $request)
    {
      $mk = new Matakuliah([
        'kode_mk' => $request->get('kode_mk'),
        'nama_mk' => $request->get('nama_mk'),
        'sks' => $request->get('sks'),
        'seksi' => $request->get('seksi'),
        'dosen' => $request->get('dosen'),
        'seksi' => $request->get('seksi'),
        'lecture_started' => $request->get('lecture_started'),
        'lecture_finished' => $request->get('lecture_finished'),
        'user_id' => $request->get('assistant')
      ]);
      $mk->save();
      return redirect()->route('matakuliah.index');
    }

    public function update(Request $request, $kode_mk){
      //$datas = Matakuliah::where('kode_mk', $kode_mk)->first();
      $datas = Matakuliah::find($kode_mk);
      $datas->update([
      'kode_mk' => $request->get('kode_mk'),
      'nama_mk' => $request->get('nama_mk'),
      'sks' => $request->get('sks'),
      'seksi' => $request->get('seksi'),
      'dosen' => $request->get('dosen'),
      'lecture_started' => $request->get('lecture_started'),
      'lecture_finished' => $request->get('lecture_finished'),
      'user_id' => $request->get('assistant')
      ]);
      /*$this->matakuliah->kode_mk = $request->get('kode_mk');
      $this->matakuliah->nama_mk = $request->get('nama_mk');
      $this->matakuliah->sks = $request->get('sks');
      $this->matakuliah->seksi = $request->get('seksi');
      $this->matakuliah->dosen = $request->get('dosen');
      $this->matakuliah->lecture_started = $request->get('lecture_started');
      $this->matakuliah->lecture_finished = $request->get('lecture_finished');
      $this->matakuliah->user_id = $request->get('assistant');*/


      return redirect()->route('matakuliah.index')->with('status', 'Matakuliah updated!');
    }

    public function destroy($id){

    }
}
