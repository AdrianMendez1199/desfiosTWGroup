<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Task extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'description',
        'user_id',
        'expiration_date',
        'created_by'
    ];

    protected $dates = ['expiration_date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getCompletedAttribute($value) {
        return $value === 0 ? 'Pendiente' : 'Completa';
    }

    public function logs() {
        return $this->hasMany(Log::class);
    }

}
