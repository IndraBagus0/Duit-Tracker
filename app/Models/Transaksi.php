<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'tanggal_transaksi',
        'nominal_transaksi',
        'catatan_transaksi',
        'jenis_transaksi',
        'id_kategori',
        'id_user',
    ];
    protected $casts = [
        'tanggal_transaksi' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}