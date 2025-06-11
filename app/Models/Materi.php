<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'pertemuan',
        'pokok_bahasan',
        'file_materi'
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }
}
