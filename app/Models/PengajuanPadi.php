<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPadi extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_padi';
    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'id_petani',
        'id_padi',
        'perlu_mobil',
        'jumlah_karung',
        'tanggal_pengajuan',
        'status',
        'keterangan',
    ];

    // Relasi ke Petani
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani', 'id_petani');
    }

    // Relasi ke Padi
    public function padi()
    {
        return $this->belongsTo(Padi::class, 'id_padi', 'id_padi');
    }
}
