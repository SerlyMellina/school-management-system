<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'tbl_nilais';

    protected $fillable = [
        'nilai',
        'id_mapel',
        'id_siswa',
    ];

    protected function mapel()
    {
        return $this->belongsTo('App\Mapel', 'id_mapel');
    }

    protected function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }

    // protected function pengumpulan()
    // {
    //     return $this->belongsTo('App\Pengumpulan', 'id_pengumpulan');
    // }
}
