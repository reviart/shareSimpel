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
      $datas = Matakuliah::orderBy('nama_mk')->get();
      return view('matakuliah.index', compact('datas'));
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
        'user_nim' => $request->get('assistant'),
        'lecture_started' => $request->get('lecture_started'),
        'lecture_finished' => $request->get('lecture_finished')
      ]);
      $mk->save();
      return redirect()->route('matakuliah.index')->with('status', 'One row created!');
    }

    public function update(Request $request, $kode_mk){
      $datas = Matakuliah::find($kode_mk);
      $datas->update([
        'kode_mk' => $request->get('kode_mk'),
        'nama_mk' => $request->get('nama_mk'),
        'sks' => $request->get('sks'),
        'seksi' => $request->get('seksi'),
        'dosen' => $request->get('dosen'),
        'user_nim' => $request->get('assistant'),
        'lecture_started' => $request->get('lecture_started'),
        'lecture_finished' => $request->get('lecture_finished')
      ]);
      return redirect()->route('matakuliah.index')->with('status', 'One row updated!');
    }

    public function destroy($kode_mk){
      $datas = Matakuliah::find($kode_mk);
      $datas->delete();
      return redirect()->route('matakuliah.index')->with('warning', 'One row deleted!');;
    }
}
