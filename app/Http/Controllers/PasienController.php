<?php

namespace App\Http\Controllers;

use App\pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        $data = pasien::all();
        return view('admin.datapasien.index', compact('data'));
    }
    
    public function edit($id){
        $data = pasien::find($id);
        return view('admin.datapasien.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat_pasien' => 'required',
            'umur_pasien' => 'required',

        ]);
        pasien::find($id)->update([
            'nama_pasien' => $request->nama_pasien,
            'alamat_pasien' => $request->alamat_pasien,
            'umur_pasien' =>  $request->umur_pasien,
        ]);

        return redirect('/patients')->with('sukses', 'Data berhasil disimpan');
    }
    public function destroy($id)
    {
        pasien::find($id)->delete();
        return redirect('/patients');
    }
}


