@extends('layouts.master-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Data Guru</li>
                            <li class="breadcrumb-item active"><a href="{{ route('tambah-guruadm') }}">Tambah Guru</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="card p-4" style="margin: 20px;">
            <div class="container-fluid">
                <form action="{{ url('tambah-guruadm') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="mb-3">
                    <label for="nama">Nama Guru</label>
                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="off"
                    placeholder="Masukkan Nama Guru..">
                </div>

                <div class="mb-3">
                    <label for="umur" class="form-label">Tanggal Lahir</label>
                    <input type="number" name="umur" class="form-control" autocomplete="off"
                    placeholder="Masukkan Tanggal Lahir.." required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-control" required>
                            <option>--- select ---</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                </div>

                <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control" autocomplete="off"
                            placeholder="Masukkan Nomor Telepon.." required>
                    </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" autocomplete="off"
                    placeholder="Masukkan alamat.." required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option>--- select ---</option>
                            <option value="Sudah Menikah">Sudah Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="foto">Choose a profile picture:</label>
                    <input type="file" id="foto" name="foto" accept="image/png, image/jpeg" required />
                </div>

                <div class="text-right">
                        <a href="{{ route('guruadm') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
