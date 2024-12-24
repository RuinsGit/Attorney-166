<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentChat extends Model
{
    use HasFactory;

    // Tablonun hangi alanlarının doldurulabileceğini belirtin
    protected $fillable = [
        'name',
        'comment',
    ];

    // Eğer timestamps kullanıyorsanız, bu alanları belirtin
    public $timestamps = true;
}