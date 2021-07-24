<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'name',
        'quantity',
        'price',
        'total'
    ];

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

}
