<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Padi;
use App\Models\Produk;



class ProduksiBeras extends Model
{
    use HasFactory;
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

    function scopeCurrentMonth($query)
    {
        return $query->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();
    }

    function scopeLastMonth($query)
    {
        return $query->whereYear('created_at', now()->subMonth()->year)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();
    }

    public function scopeLastSixMonths($query)
    {
        return $query->where('created_at', '>=', now()->subMonths(6))
            ->selectRaw('
            MONTHNAME(created_at) as month_name,
            YEAR(created_at) as year,
            MONTH(created_at) as month_number,
            COUNT(*) as total_items,
            SUM(jumlah_beras) as total_stok
        ')
            ->groupBy('month_name', 'year', 'month_number')
            ->orderBy('year', 'desc')
            ->orderBy('month_number', 'desc');
    }
}
