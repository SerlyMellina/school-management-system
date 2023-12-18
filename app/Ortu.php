<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    protected $table = 'tbl_ortus';
    protected $fillable = [
        'id_siswa',
        'nama',
        'tgl_lahir',
        'nomor_telepon',
        'jenis_kelamin',
        'alamat',
        'foto',
    ];

    protected function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }
}
