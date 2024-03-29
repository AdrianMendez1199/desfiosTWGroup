<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'seller_id',
        'date',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    // public function
}

