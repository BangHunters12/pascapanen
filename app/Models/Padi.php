<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Padi extends Model
{
    use HasFactory;

    protected $table = 'padi';
    protected $primaryKey = 'id_padi';

    // protected $appends = ['month_name'];
    protected $fillable = [
        'nama_padi',
        'warna',
        'bentuk',
        'tekstur',
        'harga',
        'stok',
        'gambar'
    ];

    // Relasi: satu padi bisa memiliki banyak produksi beras
    public function produksis()
    {
        return $this->hasMany(ProduksiBeras::class, 'id_padi', 'id_padi');
    }


    public function scopeLastSixMonths($query)
    {
        return $query->where('created_at', '>=', now()->subMonths(6))
            ->selectRaw('
            MONTHNAME(created_at) as month_name,
            YEAR(created_at) as year,
            MONTH(created_at) as month_number,
            COUNT(*) as total_items,
            SUM(stok) as total_stok
        ')
            ->groupBy('month_name', 'year', 'month_number')
            ->orderBy('year', 'desc')
            ->orderBy('month_number', 'desc');
    }
}
