<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DuesMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'iduser',
        'idduescategory',
    ];

    // Relasi ke user (anggota)
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    // Relasi ke kategori iuran
    public function duesCategory()
    {
        return $this->belongsTo(DuesCategory::class, 'id_dues_category');
    }
}
