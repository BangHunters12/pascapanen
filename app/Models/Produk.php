<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'satuan',
        'gambar' // tambahkan ini agar field gambar bisa diisi saat create/update
    ];

    public function TransaksiProduk()
{
    return $this->hasMany(TransaksiProduk::class, 'id_produk', 'id_produk');
}

}
