<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tbl_tugass';

    protected $fillable = [
        'deskripsi',
        'deadline',
        'file',
        'tgl_pengumpulan',
        'id_kelas',
        'id_mapel',
    ];

    protected function kelas()
    {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    protected function mapel()
    {
        return $this->belongsTo('App\Mapel', 'id_mapel');
    }
}
