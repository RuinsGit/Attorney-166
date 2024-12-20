<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessageData extends Model
{
    use HasFactory;

    protected $table = 'contact_messages_data';

    protected $fillable = [
        'message_az',
        'message_en',
        'message_ru',
        'image',
        'status',
    ];
}