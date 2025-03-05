<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentChat extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'comment',
    ];

    
    public $timestamps = true;
}