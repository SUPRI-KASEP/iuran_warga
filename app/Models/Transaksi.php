<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'kode_transaksi',
        'nama_pengguna',
        'tanggal_transaksi',
        'jenis_transaksi',
        'jumlah',
        'warga_id',
        'kategori_id',
    ];

    /**
     * Relasi ke pembayaran (One To Many)
     */
    public function pembayaran()
    {
        return $this->hasMany(Transaksi::class, 'transaksi_id');
    }

    /**
     * Relasi ke warga (Many To One)
     */
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    /**
     * Relasi ke kategori (Many To One)
     */
    public function kategori()
    {
        return $this->belongsTo(DuesCategory::class, 'kategori_id');
    }
}
