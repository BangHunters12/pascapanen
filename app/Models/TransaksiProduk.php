<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'nama_produk',
        'jumlah',
        'total',
        'nama_pembeli',

    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
