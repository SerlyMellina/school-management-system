<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Siswa;
use App\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = Presensi::all();
        return view('guru.presensi.index', [
            'presensi' => $presensi
        ]);
    }

    public function indexadm()
    {
        $presensi = Presensi::all();
        return view('admin.presensi.index', [
            'presensi' => $presensi
        ]);
    }

    function store(Request $request)
    {
        $presensi = new Presensi();

        $presensi->id_siswa = $request->nama;
        $presensi->status = $request->status;
        $presensi->keterangan = $request->keterangan;
        $presensi->tgl_presensi = $request->tgl_presensi;

        $presensi->save();
        return redirect('index-presensi')->with('status', 'Data berhasil ditambah');
    }

    function storeadm(Request $request)
    {
        $presensi = new Presensi();
        $presensi->id_mapel = $request->nama;
        $presensi->id_siswa = $request->nama;
        $presensi->status = $request->status;
        $presensi->keterangan = $request->keterangan;
        $presensi->tgl_presensi = $request->tgl_presensi;

        $presensi->save();
        return redirect('index-presensiadm')->with('status', 'Data berhasil ditambah');
    }

    function show()
    {
        $daftar_siswa = Siswa::all();
        return view('guru.presensi.tambah', compact('daftar_siswa'));
    }

    function showadm()
    {
        $daftar_siswa = Siswa::all();
        $daftar_mapel = Mapel::all();
        return view('admin.presensi.tambah', compact('daftar_mapel', 'daftar_siswa'));
    }


    function edit(Presensi $presensi)
    {
        return view('guru.presensi.edit', compact('presensi'));
    }

    function editadm(Presensi $presensi)
    {
        $daftar_siswa = Siswa::all();
        $daftar_mapel = Mapel::all();

        // dd($presensi->status);
        return view('admin.presensi.edit', compact('daftar_siswa', 'daftar_mapel', 'presensi'));
    }


    public function update(Request $request, Presensi $presensi)
    {
        $presensi->status = $request->input('status');

        $presensi->save();
        return redirect('index-presensi')->with('status', 'Data berhasil diupdate');
    }

    public function updateadm(Request $request, Presensi $presensi)
    {

        $presensi->id_siswa = $request->input('id_siswa');
        $presensi->status = $request->input('status');
        $presensi->keterangan = $request->input('keterangan');

        $presensi->save();

        return redirect('index-presensiadm')->with('status', 'Data berhasil diupdate');
    }


    public function StatusWarna($status)
    {
        switch ($status) {
            case 'Hadir':
                return 'btn btn-success btn-sm w-50 mt-3 text-white p-0';
            case 'Izin':
                return 'btn btn-primary btn-sm w-50 mt-3 text-white p-0';
            case 'Sakit':
                return 'btn btn-warning btn-sm w-50 mt-3 text-dark p-0';
            case 'Alpa':
                return 'btn btn-danger btn-sm w-50 mt-3 text-white p-0';
            default:
                return '';
        }
    }

    public function StatusWarnaadm($status)
    {
        switch ($status) {
            case 'Hadir':
                return 'btn btn-success btn-sm w-50 mt-3 text-white p-0';
            case 'Izin':
                return 'btn btn-primary btn-sm w-50 mt-3 text-white p-0';
            case 'Sakit':
                return 'btn btn-warning btn-sm w-50 mt-3 text-dark p-0';
            case 'Alpa':
                return 'btn btn-danger btn-sm w-50 mt-3 text-white p-0';
            default:
                return '';
        }
    }


    public function delete(Request $request)
    {
        $id = $request->input('id');
        $presensi = Presensi::find($id);

        $presensi->delete();

        return response()->json(['success' => true]);
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $presensi = Presensi::find($id);

        $presensi->delete();

        return response()->json(['success' => true]);
    }
}
