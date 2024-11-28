<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Yangi product yaratildi',
        );
    }

 
    public function content(): Content
    {
        return new Content(
            view: 'emails.product_created',
            with: [
                'agent' => $this->product,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
