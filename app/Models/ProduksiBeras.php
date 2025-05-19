<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Padi;
use App\Models\Produk;

class ProduksiBeras extends Model
{
    protected $table = 'produksi_beras';
    protected $primaryKey = 'id_produksi';

    protected $fillable = [
        'id_padi',
        'id_produk',
        'tanggal_produksi',
        'jumlah_padi',
        'jumlah_beras',
        'keterangan',
    ];

    public function padi()
    {
        return $this->belongsTo(Padi::class, 'id_padi');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
