<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'iduser',
    ];

    // Relasi ke user (petugas)
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
