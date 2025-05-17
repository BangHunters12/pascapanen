<?php

namespace App\Models;
use App\Models\jenisSewa;
use Illuminate\Database\Eloquent\Model;

class PengajuanSewa extends Model
{
    protected $table = 'pengajuan_sewa';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_petani', 'id_sewa', 'tanggal_sewa', 'lama_sewa_hari', 'biaya_sewa', 'status', 'keterangan'
    ];

    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani');
    }

    public function jenisSewa()
    {
        return $this->belongsTo(JenisSewa::class, 'id_sewa');
    }
}
