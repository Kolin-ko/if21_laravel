<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'npm', 'jk', 'tanggal_lahir', 'tempat_lahir', 'asal_sma', 'foto', 'prodi_id'];

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
