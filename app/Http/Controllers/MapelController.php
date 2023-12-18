<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function indexadm()
    {
        $mapel = Mapel::join('tbl_gurus', 'tbl_gurus.id', '=', 'tbl_mapels.id_guru')
            ->select('tbl_gurus.nama','tbl_mapels.*')->get();

        // $mapel = Mapel::all();
        // $mapel = Mapel::with('guru')->get();

        return view('admin.mapel.index', [
            'mapel' => $mapel
        ]);
    }

    public function showadm()
    {
        $daftar_guru = Guru::all();
        return view('admin.mapel.tambah', compact('daftar_guru'));
    }

    function storeadm(Request $request)
    {
        $mapel = new Mapel();
        $mapel->id_guru = $request->guru;
        $mapel->nama = $request->nama;
        $mapel->hari = $request->hari;
        $mapel->jam_mulai = $request->jam_mulai;
        $mapel->jam_selesai = $request->jam_selesai;

        $mapel->save();
        return redirect('index-mapeladm')->with('status', 'Data berhasil ditambah');
    }

    public function editadm(Mapel $mapel)
    {
        $daftar_guru = Guru::all();
        return view('admin.mapel.edit', compact('mapel', 'daftar_guru'));
    }


    public function updateadm(Request $request, Mapel $mapel)
    {
        $request->validate([
            'guru' => 'required',
            'nama' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $mapel->nama = $request->input('nama');
        $mapel->id_guru = $request->input('guru');
        $mapel->hari = $request->input('hari');
        $mapel->jam_mulai = $request->input('jam_mulai');
        $mapel->jam_selesai = $request->input('jam_selesai');


        $mapel->save();
        return redirect('index-mapeladm')->with('status', 'Data berhasil diupdate');
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $mapel = Mapel::find($id);


        $mapel->delete();

        return response()->json(['success' => true]);
    }
}
