<?php

namespace App\Models;
<<<<<<< HEAD

=======
>>>>>>> e5409382a023b42d2b33e423ed2b1bfed838dd40
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
<<<<<<< HEAD
    protected $table = 'mahasiswas';
    use HasUuids;
    
    protected $fillable = [
        'nama',
        'npm',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'asal_sma',
        'foto',
        'prodi_id'
    ];
=======
    protected $table = 'mahasiswa';

     use HasUuids;

     protected $fillable = ['nama', 'npm', 'tempat_lahir', 'tanggal_lahir', 'jk', 'asal_sma', 'foto', 'prodi_id'];
>>>>>>> e5409382a023b42d2b33e423ed2b1bfed838dd40

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
