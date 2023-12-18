@extends('layouts.master-admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Data</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="#">Update Data Guru</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="card p-4" style="margin: 20px;">
            <div class="container-fluid">
                <form action="{{ route('update-guruadm', ['id' => $guru->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="avatar">Ubah Gambar</label> <br>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                    </div>

                    <div class="mb-3">
                    <label for="nama">Nama Guru</label>
                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="off"
                        value="{{ $guru->nama }}">
                </div>

                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" autocomplete="off"
                        value="{{ $guru->tgl_lahir }}">
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <input type="text" name="gender" id="gender" class="form-control" autocomplete="off"
                        value="{{ $guru->jenis_kelamin }}">
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" autocomplete="off"
                        value="{{ $guru->nomor_telepon }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" autocomplete="off"
                        value="{{ $guru->alamat }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" id="status" class="form-control" autocomplete="off"
                        value="{{ $guru->status }}">
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