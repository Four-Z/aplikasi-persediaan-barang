<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'detail_barang_keluar';

    protected $fillable = [
        'barang_keluar_id',
        'barang_id',
        'jumlah_barang'
    ];


}
