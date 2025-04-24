<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'faktur';
    public $timestamps = true;

    protected $fillable = [
    'faktur',
    'nopelanggan',
    'kodebarang',
    'tanggalpenjualan',
    ];

    public function barang()
{
    return $this->belongsTo(Barang::class, 'kodebarang', 'kodebarang');
}


    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'nopelanggan', 'nopelanggan');
    }
}
