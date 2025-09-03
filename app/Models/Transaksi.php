<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'kode_transaksi', 'nama_pengguna', 'tanggal_transaksi', 'jenis_transaksi', 'jumlah'
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'transaksi_id');
    }
}

// app/Models/Pembayaran.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'transaksi_id', 'nominal', 'tanggal_bayar'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
