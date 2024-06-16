<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReminder extends Model
{
    use HasFactory;

    protected $table = 'tbl_paymentReminder';
    protected $primaryKey = 'notifId';

    protected $casts = [
        'reminderDate' => 'datetime',
    ];

    protected $fillable = [
        'reminderDate',
        'nominal',
        'description',
        'status',
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
