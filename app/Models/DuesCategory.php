<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DuesCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'periode',
        'amount',
        'status',
        'description',
    ];


    public function members()
    {
        return $this->hasMany(DuesMember::class, 'id_dues_category');
    }
}
