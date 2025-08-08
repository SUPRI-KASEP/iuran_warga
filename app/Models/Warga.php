<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga'; // nama tabel di database
    protected $fillable = ['nama', 'nik', 'jk', 'alamat', 'no_rumah', 'status'];
}

