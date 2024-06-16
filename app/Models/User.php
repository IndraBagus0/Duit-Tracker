<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_users';
    protected $fillable = [
        'name', 'email', 'password', 'phoneNumber', 'accountBalance', 'roleId'
    ];
    protected $hidden = [
        'password',
    ];

    public function paymentReminders()
    {
        return $this->hasMany(PaymentReminder::class, 'userId');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'userId');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleId');
    }
}
