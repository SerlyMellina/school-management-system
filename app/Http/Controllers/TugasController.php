<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mapel;
use App\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();

        return view('guru.tugas.index', [
            'tugas' => $tugas
        ]);
    }

    public function indexadm()
    {
        // $tugas = Tugas::all();
        $tugas = Tugas::join('tbl_kelass', 'tbl_kelass.id', '=', 'tbl_tugass.id_kelas')
            ->join('tbl_mapels', 'tbl_mapels.id', '=', 'tbl_tugass.id_mapel')
            ->select('tbl_kelass.*', 'tbl_mapels.*', 'tbl_tugass.*')
            ->get();
        // dd($tugas);
        return view('admin.tugas.index', [
            'tugas' => $tugas
        ]);
    }

    function show()
    {
        $daftar_kelas = Kelas::all();
        $daftar_mapel = Mapel::all();
        return view('guru.tugas.tambah', compact('daftar_kelas', 'daftar_mapel'));
    }

    function showadm()
    {
        $daftar_kelas = Kelas::all();
        $daftar_mapel = Mapel::all();
        return view('admin.tugas.tambah', compact('daftar_kelas', 'daftar_mapel'));
    }

    function store(Request $request)
    {
        $tugas = new Tugas();

        $tugas->deskripsi = $request->deskripsi;
        $tugas->id_kelas = $request->kelas;
        $tugas->id_mapel = $request->mapel;
        $tugas->tgl_pengumpulan = $request->deadline;

        if ($request->hasFile('file')) {
            $avatar = $request->file('file');
            $avatarName = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/tugas'), $avatarName);
            $tugas->file = $avatarName;
        }

        $tugas->save();
        return redirect('index-tugas')->with('status', 'Data berhasil ditambah');
    }

    function storeadm(Request $request)
    {
        $tugas = new Tugas();

        $tugas->deskripsi = $request->deskripsi;
        $tugas->id_kelas = $request->kelas;
        $tugas->id_mapel = $request->mapel;
        $tugas->tgl_pengumpulan = $request->deadline;


        if ($request->hasFile('file')) {
            $avatar = $request->file('file');
            $avatarName = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/tugas'), $avatarName);
            $tugas->file = $avatarName;
        }

        $tugas->save();
        return redirect('index-tugasadm')->with('status', 'Data berhasil ditambah');
    }

    public function edit(Tugas $tugas)
    {
        $daftar_kelas = Kelas::all();
        $daftar_mapel = Mapel::all();
        return view('guru.tugas.edit', compact('tugas', 'daftar_kelas', 'daftar_mapel'));
    }

    public function editadm(Tugas $tugas)
    {
        $daftar_kelas = Kelas::all();
        $daftar_mapel = Mapel::all();
        return view('admin.tugas.edit', compact('tugas', 'daftar_kelas', 'daftar_mapel'));
    }

    public function update(Request $request, Tugas $tugas)
    {
        $tugas->deskripsi = $request->input('deskripsi');
        $tugas->id_kelas = $request->input('kelas');
        $tugas->id_mapel = $request->input('mapel');
        $tugas->tgl_pengumpulan = $request->input('deadline');

        if ($request->hasFile('file')) {
            if ($tugas->foto) {
                $oldPhotoPath = public_path('uploads/tugas/' . $tugas->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('file');
            $fileName = now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/tugas'), $fileName);
            $tugas->file = $fileName;
        }

        $tugas->save();
        return redirect('index-tugas')->with('status', 'Data berhasil diupdate');
    }


    public function updateadm(Request $request, Tugas $tugas)
    {
        $tugas->deskripsi = $request->input('deskripsi');
        $tugas->id_kelas = $request->input('kelas');
        $tugas->id_mapel = $request->input('mapel');
        $tugas->tgl_pengumpulan = $request->input('deadline');


        if ($request->hasFile('file')) {
            if ($tugas->foto) {
                $oldPhotoPath = public_path('uploads/tugas/' . $tugas->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('file');
            $fileName = now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/tugas'), $fileName);
            $tugas->file = $fileName;
        }

        $tugas->save();
        return redirect('index-tugasadm')->with('status', 'Data berhasil diupdate');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $tugas = Tugas::find($id);

        if ($tugas->file) {
            $photoPath = public_path('uploads/tugas/' . $tugas->file);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $tugas->delete();

        return response()->json(['success' => true]);
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $tugas = Tugas::find($id);

        if ($tugas->file) {
            $photoPath = public_path('uploads/tugas/' . $tugas->file);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $tugas->delete();

        return response()->json(['success' => true]);
    }
}
