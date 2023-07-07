<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $siswa = Siswa::all(); //membuat variable siswa yang mengambil model Siswa dengan method all

        return view('siswa', compact('siswa'));  //tampilkan view dengan nama file siswa kemudian mengirim variable siswa (yg ada di compact) ke views
    }

    public function store(Request $request){
        Siswa::create([
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);
        return redirect('siswa')->with('success', 'Data Berhasil Dibuat.');
    }

    public function edit(Request $request){
        Siswa::where('id', $request->id)->update([
            'nama'     => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat'   => $request->alamat,
            'jk'       => $request->jk,
        ]);
        return redirect('siswa')->with('success', 'Data Berhasil Diubah');
    }
    public function hapus(Request $request){
        Siswa::where('id', $request->id)->delete();
        return redirect('siswa')->with('success', 'Data Berhasil Dihapus');
    }
}

