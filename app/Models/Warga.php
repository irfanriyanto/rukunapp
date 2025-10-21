<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'status_rumah'
    ];
}
