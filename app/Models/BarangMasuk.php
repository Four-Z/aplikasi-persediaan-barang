<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'supplier_id',
        'staff_id',
        'catatan',
        'tanggal'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class)->withTrashed();
    }

    public function detailBarang()
    {
        return $this->hasMany(DetailBarangMasuk::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
