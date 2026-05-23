<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'kelas',
        'umur',
        'alamat',
        'foto'
    ];
}
