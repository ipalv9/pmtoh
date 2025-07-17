<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_handphone',
        'alamat',
    ];

    // Relasi: 1 pelanggan punya 1 pesanan
    public function pemesanan()
    {
        return $this->belongTo(Pemesanan::class);
    }
}
