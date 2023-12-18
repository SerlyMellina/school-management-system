<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'tbl_siswas';
    protected $fillable = [
        'id_kelas',
        'nama',
        'tgl_lahir',
        'nomor_telepon',
        'jenis_kelamin',
        'alamat',
        'foto',
    ];

    protected function kelas()
    {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }
}
