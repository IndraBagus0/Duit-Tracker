<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'no_hp', 'saldo', 'id_role'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    
}
