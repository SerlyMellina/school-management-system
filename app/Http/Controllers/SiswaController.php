<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public static function statusOptions()
    {
        return ['Hadir', 'Sakit', 'Izin', 'Alpa'];
    }

    public function index()
    {
        $siswa = Siswa::all();
        $daftar_kelas = Kelas::all();

        return view('guru.siswa.index', compact('siswa', 'daftar_kelas'));
    }

    public function indexadm()
    {
        $siswa = Siswa::all();
        $siswa = Siswa::join('tbl_kelass', 'tbl_kelass.id', '=', 'tbl_siswas.id_kelas')
            ->select('tbl_kelass.nama_kelas', 'tbl_siswas.*')
            ->get();

        return view('admin.siswa.index', [
            'siswa' => $siswa
        ]);
    }

    function show()
    {
        $daftar_kelas = Kelas::all();
        return view('guru.siswa.tambah', compact('daftar_kelas'));
    }

    function showadm()
    {
        $daftar_kelas = Kelas::all();
        return view('admin.siswa.tambah', compact('daftar_kelas'));
    }


    function store(Request $request)
    {
        $siswa = new Siswa();

        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->kelas;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->nomor_telepon = $request->telepon;
        $siswa->jenis_kelamin = $request->gender;
        $siswa->alamat = $request->alamat;

        // Mengirim Foto
        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $format = now()->format('YmdHis') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/siswa'), $format);
            $siswa->foto = $format;
        }

        $siswa->save();
        return redirect('index-siswa')->with('status', 'Data berhasil ditambah');
    }

    function storeadm(Request $request)
    {
        $siswa = new Siswa();

        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->kelas;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->nomor_telepon = $request->telepon;
        $siswa->jenis_kelamin = $request->gender;
        $siswa->alamat = $request->alamat;

        // Mengirim Foto
        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $format = now()->format('YmdHis') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/siswa'), $format);
            $siswa->foto = $format;
        }

        $siswa->save();
        return redirect('index-siswaadm')->with('status', 'Data berhasil ditambah');
    }



    public function edit(Siswa $siswa)
    {
        $daftar_kelas = Kelas::all();
        return view('guru.siswa.edit', compact('siswa', 'daftar_kelas'));
    }

    public function editadm(Siswa $siswa)
    {
        $daftar_kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'daftar_kelas'));
    }
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ]);

        $siswa->nama = $request->input('nama');
        $siswa->id_kelas = $request->input('kelas');
        $siswa->tgl_lahir = $request->input('tgl_lahir');
        $siswa->nomor_telepon = $request->input('telepon');
        $siswa->jenis_kelamin = $request->input('gender');
        $siswa->alamat = $request->input('alamat');

        if ($request->hasFile('avatar')) {
            if ($siswa->foto) {
                $oldPhotoPath = public_path('uploads/siswa/' . $siswa->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Mengirim Foto
            $avatar = $request->file('avatar');
            $format = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/siswa'), $format);
            $siswa->foto = $format;
        }

        $siswa->save();
        return redirect('index-siswa')->with('status', 'Data berhasil diupdate');
    }


    public function updateadm(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'tgl_lahir' => 'required',
            'telepon' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ]);

        $siswa->nama = $request->input('nama');
        $siswa->id_kelas = $request->input('kelas');
        $siswa->tgl_lahir = $request->input('tgl_lahir');
        $siswa->nomor_telepon = $request->input('telepon');
        $siswa->jenis_kelamin = $request->input('gender');
        $siswa->alamat = $request->input('alamat');

        if ($request->hasFile('avatar')) {
            if ($siswa->foto) {
                $oldPhotoPath = public_path('uploads/siswa/' . $siswa->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Mengirim Foto
            $avatar = $request->file('avatar');
            $format = now()->format('YmdHis') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/siswa'), $format);
            $siswa->foto = $format;
        }

        $siswa->save();
        return redirect('index-siswaadm')->with('status', 'Data berhasil diupdate');
    }


    public function delete(Request $request)
    {
        $id = $request->input('id');
        $siswa = Siswa::find($id);

        if ($siswa->foto) {
            $photoPath = public_path('uploads/siswa/' . $siswa->foto);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $siswa->delete();

        return response()->json(['success' => true]);
    }

    public function deleteadm(Request $request)
    {
        $id = $request->input('id');
        $siswa = Siswa::find($id);

        if ($siswa->foto) {
            $photoPath = public_path('uploads/siswa/' . $siswa->foto);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $siswa->delete();

        return response()->json(['success' => true]);
    }
}
