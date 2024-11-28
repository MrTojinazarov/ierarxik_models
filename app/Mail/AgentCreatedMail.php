<?php

namespace App\Mail;

use App\Models\Agent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AgentCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

   
    public $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Yangi agent yaratildi',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.agent_created',
            with: [
                'agent' => $this->agent,
            ]
        );
    }

 
    public function attachments(): array
    {
        return [];
    }
}
