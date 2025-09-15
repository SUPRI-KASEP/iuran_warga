<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga'; // nama tabel di database
    protected $fillable = [
    'nik',
    'nama',
    'jk',
    'kategori',
    'alamat',
    'no_rumah',
    'status',
];

}

