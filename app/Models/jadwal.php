<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasUuids;
    protected $fillable = ['tahun_akademik', 'kode_smt', 'kelas', 'mata_kuliah_id', 'dosen_id', 'sesi_id'];

    protected $table = 'jadwal';

    public function mata_kuliah() {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }
    public function dosen() {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }
    public function sesi() {
        return $this->belongsTo(Sesi::class, 'sesi_id', 'id');
    }
}
