<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'tbl_mapels';
    protected $fillable = [
        'id_guru',
        'nama',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    protected function guru()
    {
        return $this->belongsTo('App\Guru');
    }
}
