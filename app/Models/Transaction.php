<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'tbl_transaction';
    protected $primaryKey = 'transactionId';

    protected $fillable = [
        'transactionDate',
        'transactionAmount',
        'notesTransaction',
        'transactionType',
        'categoryId',
        'userId',
    ];
    protected $casts = [
        'transactionDate' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(category::class, 'categoryId', 'categoryId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
