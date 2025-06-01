<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class sesi extends Model
{
    use HasUuids;

    protected $sesi = 'sesi';
    protected $fillable = ['nama'];
}
