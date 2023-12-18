<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Nilai;
use App\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::all();
        return view('guru.nilai.index', [
            'nilai' => $nilai
        ]);
    }

    public function indexadm()
    {
        // $nilai = Nilai::all();

        $nilai = Nilai::join('tbl_mapels', 'tbl_mapels.id', '=', 'tbl_nilais.id_mapel')
            ->join('tbl_siswas', 'tbl_siswas.id', '=', 'tbl_nilais.id_siswa')
            ->select('tbl_mapels.*', 'tbl_nilais.*', 'tbl_siswas.*')
            ->get();


        return view('admin.nilai.index', [
            'nilai' => $nilai
        ]);
    }
    function show()
    {
        $daftar_mapel = Mapel::all();
        $daftar_siswa = Siswa::all();
        return view('guru.nilai.tambah', compact('daftar_mapel', 'daftar_siswa'));
    }

    function showadm()
    {
        $daftar_mapel = Mapel::all();
        $daftar_siswa = Siswa::all();
        return view('admin.nilai.tambah', compact('daftar_mapel', 'daftar_siswa'));
    }


    function store(Request $request)
    {
        $nilai = new Nilai();

        $nilai->id_mapel = $request->mapel;
        $nilai->id_siswa = $request->siswa;
        $nilai->nilai = $request->nilai;

        $nilai->save();
        return redirect('index-nilai')->with('status', 'Data berhasil ditambah');
    }

    function storeadm(Request $request)
    {
        $nilai = new Nilai();

        $nilai->id_mapel = $request->mapel;
        $nilai->id_siswa = $request->siswa;
        $nilai->nilai = $request->nilai;

        $nilai->save();
        return redirect('index-nilaiadm')->with('status', 'Data berhasil ditambah');
    }

    public function editadm(Nilai $nilai)
    {
        $daftar_siswa = Siswa::all();
        $daftar_mapel = Mapel::all();
        return view('admin.nilai.edit', compact('nilai', 'daftar_siswa', 'daftar_mapel'));
    }

    public function updateadm(Request $request, Nilai $nilai)
    {
        $request->validate([
            'mapel' => 'required',
            'siswa' => 'required',
            'nilai' => 'required',
        ]);

        $nilai->id_mapel = $request->input('mapel');
        $nilai->id_siswa = $request->input('siswa');
        $nilai->nilai = $request->input('nilai');

        $nilai->save();
        return redirect('index-nilaiadm')->with('status', 'Data berhasil diupdate');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $nilai = Nilai::find($id);

        $nilai->delete();

        return response()->json(['success' => true]);
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $nilai = Nilai::find($id);

        $nilai->delete();

        return response()->json(['success' => true]);
    }
}
