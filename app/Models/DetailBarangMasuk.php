<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'detail_barang_masuk';

    protected $fillable = [
        'barang_masuk_id',
        'barang_id',
        'jumlah_barang'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class)->withTrashed();
    }
}
