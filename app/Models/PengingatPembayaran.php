<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengingatPembayaran extends Model
{
    use HasFactory;

    protected $table = 'pengingat_pembayaran';
    protected $primaryKey = 'id_notif';

    protected $fillable = [
        'tanggal_pengingat',
        'nominal',
        'deskripsi',
        'status',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
