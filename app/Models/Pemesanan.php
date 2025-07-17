<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelanggan',
        'id_tarif',
        'tgl_tiket',
        'jumlah',
        'harga',
        'status',
    ];

    public function pelanggan()
        {
            return $this->hasOne(Pelanggan::class, 'id', 'id_pelanggan');
        }

    public function tarif()
        {
            return $this->hasOne(Tarif::class, 'id', 'id_tarif');
        }
}
