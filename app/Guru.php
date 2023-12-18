<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'tbl_gurus';

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'nomor_telepon',
        'jenis_kelamin',
        'alamat',
        'status',
        'foto',
    ];

    protected function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }
}
