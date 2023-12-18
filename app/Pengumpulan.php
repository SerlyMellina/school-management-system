<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'tbl_pengumpulans';

    protected $fillable = [
        'file',
        'catatan',
        'id_siswa',
        'id_mapel',
    ];

    protected function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }

    protected function mapel()
    {
        return $this->belongsTo('App\Mapel', 'id_mapel');
    }
}
