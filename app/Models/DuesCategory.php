<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DuesCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'period',
        'nominal',
        'status',
    ];

    // Relasi ke anggota iuran
    public function members()
    {
        return $this->hasMany(DuesMember::class, 'idduescategory');
    }
}
