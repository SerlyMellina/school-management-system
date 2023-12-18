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
                            <li class="breadcrumb-item active"><a href="#">Update Data Presensi</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



        <div class="card p-4" style="margin: 20px;">
            <div class="container-fluid">
                <form action="{{ route('update-presensiadm', ['presensi' => $presensi->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <select name="id_siswa" id="id_siswa" class="form-control">
                            @foreach ($daftar_siswa as $siswa)
                                <option value="{{ $siswa->id }}"
                                    {{ $siswa->id == $presensi->id_siswa ? 'selected' : '' }}>
                                    {{ $siswa->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled selected>--- Pilih Status ---</option>
                            <option value="Hadir" {{ old('status', $presensi->status) == 'Hadir' ? 'selected' : '' }}>
                                Hadir</option>
                            <option value="Sakit" {{ old('status', $presensi->status) == 'Sakit' ? 'selected' : '' }}>
                                Sakit</option>
                            <option value="Izin" {{ old('status', $presensi->status) == 'Izin' ? 'selected' : '' }}>
                                Izin</option>
                            <option value="Alpa" {{ old('status', $presensi->status) == 'Alpa' ? 'selected' : '' }}>
                                Alpa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label><sup>(optional)</sup>
                        <input type="text" id="keterangan" name="keterangan"
                            @if (old('keterangan')) value="{{ old('keterangan') }}"
                            @else
                                value="{{ $presensi->keterangan }}" @endif
                            class="form-control">
                    </div>
                    <div class="text-right">
                        <a href="{{ route('presensiadm') }}" class="btn btn-outline-secondary mr-2"
                            role="button">Batal</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
