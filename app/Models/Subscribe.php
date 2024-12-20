<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    // Tablonun hangi alanlarının doldurulabileceğini belirtin
    protected $fillable = [
        'email',
        'status',
    ];

    // Eğer timestamps kullanıyorsanız, bu alanları belirtin
    public $timestamps = true;
}