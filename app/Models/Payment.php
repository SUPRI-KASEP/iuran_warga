<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'iduser',
        'period',
        'nominal',
        'petugas',
    ];

    // Relasi ke user sebagai pembayar
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    // Relasi ke user sebagai petugas
    public function officer()
    {
        return $this->belongsTo(User::class, 'petugas');
    }
}
