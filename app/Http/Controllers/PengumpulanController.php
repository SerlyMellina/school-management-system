<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Siswa;
use App\Pengumpulan;
use Illuminate\Http\Request;

class PengumpulanController extends Controller
{
    public function index()
    {
        $pengumpulan = Pengumpulan::all();
        return view('guru.pengumpulan.index', [
            'pengumpulan' => $pengumpulan
        ]);
    }

    public function indexadm()
    {
        // $pengumpulan = Pengumpulan::all();
        $pengumpulan = Pengumpulan::join('tbl_siswas', 'tbl_siswas.id', '=', 'tbl_pengumpulans.id_siswa')
            ->join('tbl_mapels', 'tbl_mapels.id', '=', 'tbl_pengumpulans.id_mapel')
            ->select('tbl_siswas.*', 'tbl_mapels.*', 'tbl_pengumpulans.*')
            ->get();
        return view('admin.pengumpulan.index', [
            'pengumpulan' => $pengumpulan
        ]);
    }

    public function show()
    {
        $daftar_siswa = Siswa::all();
        $daftar_mapel = Mapel::all();
        return view('guru.pengumpulan.tambah', compact('daftar_siswa', 'daftar_mapel'));
    }

    public function showadm()
    {
        $daftar_siswa = Siswa::all();
        $daftar_mapel = Mapel::all();
        return view('admin.pengumpulan.tambah', compact('daftar_siswa', 'daftar_mapel'));
    }


    public function store(Request $request)
    {
        $pengumpulan = new Pengumpulan();

        $pengumpulan->id_siswa = $request->nama;
        $pengumpulan->id_mapel = $request->mapel;
        $pengumpulan->catatan = $request->catatan;

        if ($request->hasFile('file')) {
            $avatar = $request->file('file');
            $avatarName = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/pengumpulan'), $avatarName);
            $pengumpulan->file = $avatarName;
        }

        $pengumpulan->save();
        return redirect('index-pengumpulan')->with('status', 'Data berhasil ditambah');
    }

    public function storeadm(Request $request)
    {
        $pengumpulan = new Pengumpulan();

        $pengumpulan->id_siswa = $request->nama;
        $pengumpulan->id_mapel = $request->mapel;
        $pengumpulan->catatan = $request->catatan;

        if ($request->hasFile('file')) {
            $avatar = $request->file('file');
            $avatarName = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/pengumpulan'), $avatarName);
            $pengumpulan->file = $avatarName;
        }

        $pengumpulan->save();
        return redirect('index-pengumpulanadm')->with('status', 'Data berhasil ditambah');
    }

    function edit(Pengumpulan $pengumpulan)
    {
        $daftar_mapel = Mapel::all();
        $daftar_siswa = Siswa::all();
        return view('guru.pengumpulan.edit', compact('pengumpulan', 'daftar_mapel', 'daftar_siswa'));
    }

    function editadm(Pengumpulan $pengumpulan)
    {
        $daftar_mapel = Mapel::all();
        $daftar_siswa = Siswa::all();
        return view('admin.pengumpulan.edit', compact('pengumpulan', 'daftar_mapel', 'daftar_siswa'));
    }

    function update(Request $request, Pengumpulan $pengumpulan)
    {
        $pengumpulan->id_mapel = $request->mapel;
        $pengumpulan->id_siswa = $request->siswa;
        $pengumpulan->catatan = $request->catatan;

        if ($request->hasFile('file')) {
            $avatar = $request->file('file');
            $avatarName = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/pengumpulan'), $avatarName);
            $pengumpulan->file = $avatarName;

        }

        $pengumpulan->save();
        return redirect('index-pengumpulan')->with('status', 'Data berhasil ditambah');
    }

    function updateadm(Request $request, Pengumpulan $pengumpulan)
    {
        $pengumpulan->id_mapel = $request->mapel;
        $pengumpulan->id_siswa = $request->siswa;
        $pengumpulan->catatan = $request->catatan;

        if ($request->hasFile('file')) {
            $avatar = $request->file('file');
            $avatarName = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/pengumpulan'), $avatarName);
            $pengumpulan->file = $avatarName;

        }

        $pengumpulan->save();
        return redirect('index-pengumpulanadm')->with('status', 'Data berhasil ditambah');
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $pengumpulan = Pengumpulan::find($id);

        $pengumpulan->delete();

        return response()->json(['success' => true]);
    }
}
