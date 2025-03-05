<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMessage;

    public function __construct(ContactMessage $contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->subject('Yeni Əlaqə Tələbi')
                    ->html("
                        <h2>Yeni Əlaqə Tələbi</h2>
                        <p><strong>Ad:</strong> {$this->contactMessage->name}</p>
                        <p><strong>E-poçt:</strong> {$this->contactMessage->email}</p>
                        <p><strong>Telefon:</strong> {$this->contactMessage->phone}</p>
                        <p><strong>Mesaj:</strong> {$this->contactMessage->message}</p>
                        <p><strong>Tarix:</strong> " . now()->format('d.m.Y H:i:s') . "</p>
                    ");
    }
} 