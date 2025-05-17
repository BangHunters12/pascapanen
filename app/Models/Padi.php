<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padi extends Model
{
    use HasFactory;

    protected $table = 'padi';

    protected $primaryKey = 'id_padi';
    protected $fillable = [
        'nama_padi',
        'warna',
        'bentuk',
        'tekstur',
        'harga',
        'gambar',
        'stok',
    ];
}
