<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = 'category';

    protected $fillable = [
        'nama_kategori',
        'keterangan_kategori',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_kategori', 'id_kategori');
    }
}
