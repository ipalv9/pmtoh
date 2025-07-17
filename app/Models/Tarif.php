<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $fillable = [
        'dari',
        'tujuan',
    ];

    public function pemesanans()
    {
        return $this->belongTo(Pemesanan::class);
    }
}
