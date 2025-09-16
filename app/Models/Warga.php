<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Warga extends Authenticatable
{
    protected $table = 'warga'; // nama tabel di database
//     protected $fillable = [
//     'nik',
//     'nama',
//     'jk',
//     'level',
//     'alamat',
//     'no_rumah',
//     'status',
// ];
protected $guarded = [];
}
