<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'password',
        'nohp',
        'address',
        'level',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi dengan Officer (satu user bisa jadi petugas)
    public function officer()
    {
        return $this->hasOne(Officer::class, 'iduser');
    }

    // Relasi dengan Payment (satu user bisa punya banyak pembayaran)
    public function payments()
    {
        return $this->hasMany(Payment::class, 'iduser');
    }

    // Relasi untuk menjadi petugas pembayaran (dari kolom 'petugas')
    public function tugasPembayaran()
    {
        return $this->hasMany(Payment::class, 'petugas');
    }

    // Relasi ke iuran anggota
    public function duesMemberships()
    {
        return $this->hasMany(DuesMember::class, 'iduser');
    }
}
