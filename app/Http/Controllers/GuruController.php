<?php

namespace App\Http\Controllers;
use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function indexadm()
    {
        $guru = Guru::all();
        return view('admin.guru.index', [
            'guru' => $guru
        ]);
    }

    function showadm()
    {
        return view('admin.guru.tambah');
    }

    function storeadm(Request $request)
    {
        $guru = new Guru();

        $guru->nama = $request->nama;
        $guru->umur = $request->umur;
        $guru->jenis_kelamin = $request->gender;
        $guru->nomor_telepon = $request->telepon;
        $guru->alamat = $request->alamat;
        $guru->status = $request->status;


        // Mengirim Foto
        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $format = now()->format('YmdHis') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/guru'), $format);
            $guru->foto = $format;
        }

        $guru->save();
        return redirect('index-guruadm')->with('status', 'Data berhasil ditambah');
    }

    public function editadm(Guru $guru){
        return view('admin.guru.edit', [
        'guru' => $guru
    ]);
    }

    public function updateadm(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        $guru->nama = $request->input('nama');
        $guru->tgl_lahir = $request->input('tgl_lahir');
        $guru->jenis_kelamin = $request->input('gender');
        $guru->nomor_telepon = $request->input('telepon');
        $guru->alamat = $request->input('alamat');
        $guru->status = $request->input('status');

        if ($request->hasFile('avatar')) {
            if ($guru->foto) {
                $oldPhotoPath = public_path('uploads/guru/' . $guru->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Mengirim Foto
            $avatar = $request->file('avatar');
            $format = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/guru'), $format);
            $guru->foto = $format;
        }

        $guru->save();
        return redirect('index-guruadm')->with('status', 'Data berhasil diupdate');
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $guru = Guru::find($id);

        if ($guru->foto) {
            $photoPath = public_path('uploads/guru/' . $guru->foto);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $guru->delete();

        return response()->json(['success' => true]);
    }

}
