<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Ortu;
use Illuminate\Http\Request;

class OrtuController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function indexadm()
    {
        $ortu = Ortu::all();
        return view('admin.ortu.index', [
            'ortu' => $ortu
        ]);
    }

    function showadm()
    {
        $daftar_siswa = Siswa::all();
        return view('admin.ortu.tambah', compact('daftar_siswa'));
    }

    function storeadm(Request $request)
    {
        $ortu = new Ortu();

        $ortu->nama = $request->nama;
        $ortu->id_siswa = $request->siswa;
        $ortu->tgl_lahir = $request->tgl_lahir;
        $ortu->nomor_telepon = $request->telepon;
        $ortu->jenis_kelamin = $request->gender;
        $ortu->alamat = $request->alamat;

        // Mengirim Foto
        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $format = now()->format('YmdHis') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/ortu'), $format);
            $ortu->foto = $format;
        }

        $ortu->save();
        return redirect('index-ortuadm')->with('status', 'Data berhasil ditambah');
    }

    public function editadm(Ortu $ortu)
    {
        $daftar_siswa = Siswa::all();
        return view('admin.ortu.edit', compact('ortu', 'daftar_siswa'));
    }

    public function updateadm(Request $request, Ortu $ortu)
    {
        $request->validate([
            'nama' => 'required',
            'siswa' => 'required',
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ]);

        $ortu->nama = $request->input('nama');
        $ortu->id_siswa = $request->input('siswa');
        $ortu->tgl_lahir = $request->input('tgl_lahir');
        $ortu->nomor_telepon = $request->input('telepon');
        $ortu->jenis_kelamin = $request->input('gender');
        $ortu->alamat = $request->input('alamat');

        if ($request->hasFile('avatar')) {
            if ($ortu->foto) {
                $oldPhotoPath = public_path('uploads/ortu/' . $ortu->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Mengirim Foto
            $avatar = $request->file('avatar');
            $format = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/ortu'), $format);
            $ortu->foto = $format;
        }

        $ortu->save();
        return redirect('index-ortuadm')->with('status', 'Data berhasil diupdate');
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $ortu = Ortu::find($id);

        if ($ortu->foto) {
            $photoPath = public_path('uploads/ortu/' . $ortu->foto);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $ortu->delete();

        return response()->json(['success' => true]);
    }
}
