<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'tbl_category';

    protected $primaryKey = 'tbl_category';

    protected $fillable = [
        'categoryName',
        'descriptionCategory',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'categoryId', 'categoryId');
    }
}
