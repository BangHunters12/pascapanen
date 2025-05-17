<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'satuan',
        'gambar' // tambahkan ini agar field gambar bisa diisi saat create/update
    ];
}
