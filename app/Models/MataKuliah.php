<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    use HasUuids;

    protected $fillable = ['kode_mk', 'nama', 'prodi_id'];

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
