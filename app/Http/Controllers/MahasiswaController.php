<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::paginate(5);
        $title = "Data Mahasiswa";
        return view('admin.mahasiswa', compact('title', 'mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        $title = "Masukan Data Mahasiswa";
        return view('admin.addmhs', compact('title', 'jurusan', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Kolom :Attribute Harus Diisi!',
            'date' => 'Kolom :Attribute Harus Diisi!',
            'numeric' => 'Kolom :Attribute Harus Diisi!'
        ];
        $validasi = $request->validate([
            'nim' => 'required|unique:Mahasiswas|max:10',
            'nama' => 'required'
        ], $message);
        $validasi['jurusan_id'] = Auth::id();
        $validasi['prodi_id'] = Auth::id();
        Mahasiswa::create($validasi);
        return redirect('mahasiswa')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        $mhs = Mahasiswa::find($id);
        $title = "Edit Data Mahasiswa";
        return view('admin.addmhs', compact('title', 'mhs', 'jurusan', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Kolom :Attribute Harus Diisi!',
            'date' => 'Kolom :Attribute Harus Diisi!',
            'numeric' => 'Kolom :Attribute Harus Diisi!'
        ];
        $validasi = $request->validate([
            'nim' => '',
            'nama' => ''
        ], $message);
        $validasi['jurusan_id'] = Auth::id();
        $validasi['prodi_id'] = Auth::id();
        Mahasiswa::where('id', $id)->update($validasi);
        return redirect('mahasiswa')->with('success', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = Mahasiswa::find($id);
        Mahasiswa::where('id', $id)->delete();
        return redirect('mahasiswa')->with('success', 'Data Berhasil Dihapus!');
    }
}