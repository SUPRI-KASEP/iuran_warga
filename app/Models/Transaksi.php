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
    ];

    protected $dates = ['tanggal_transaksi'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
