<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    
    use HasUuids;
    protected $fillable = ['nama', 'singkatan', 'kaprodi', 'sekretaris', 'fakultas_id'];
    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }
}
