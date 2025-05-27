<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
use HasUuids;
    protected $table = 'prodi';
    
<<<<<<< HEAD
    use HasUuids;
    protected $fillable = ['nama', 'singkatan', 'kaprodi', 'sekretaris', 'fakultas_id'];
=======
    protected $fillable = ['nama', 'singkatan', 'kaprodi', 'sekretaris', 'fakultas_id'];


>>>>>>> e5409382a023b42d2b33e423ed2b1bfed838dd40
    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }
}
