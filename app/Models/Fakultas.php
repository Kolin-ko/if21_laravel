<?php

namespace App\Models;
<<<<<<< HEAD


=======
>>>>>>> e5409382a023b42d2b33e423ed2b1bfed838dd40
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasUuids;

    
    protected $fillable = ['nama', 'singkatan', 'nama_dekan', 'nama_wadek'];
}
