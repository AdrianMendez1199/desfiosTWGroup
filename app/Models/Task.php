<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'user_id',
        'expiration_date',
        'created_by'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getCompletedAttribute($value) {
        return $value === 0 ? 'Pendiente' : 'Completa';
    }

}
