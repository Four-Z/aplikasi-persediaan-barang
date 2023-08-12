<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';

    protected $fillable = [
        'supplier_id',
        'staff_id',
        'catatan',
        'tanggal'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function detailBarangKeluar()
    {
        return $this->hasMany(DetailBarangKeluar::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class);
    }
}
