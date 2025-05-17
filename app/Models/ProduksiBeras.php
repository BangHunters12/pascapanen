<?php
namespace App\Models;
use App\Models\Produk;

use Illuminate\Database\Eloquent\Model;

class ProduksiBeras extends Model
{
    protected $table = 'produksi_beras';
    protected $primaryKey = 'id_produksi';
    protected $fillable = [
        'id_padi', 'id_produk', 'tanggal_produksi', 'jumlah_padi', 'jumlah_beras', 'keterangan'
    ];

    public function padi()
    {
        return $this->belongsTo(Padi::class, 'id_padi');
        $padi = Padi::whereIn('id', Produk::pluck('id_padi'))->get();
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
