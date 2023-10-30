<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class TicketSold extends Mailable
{
    use Queueable, SerializesModels;

    public $tickets;
    public $name;


    /**
     * Create a new message instance.
     */
    public function __construct(string $name, Collection $tickets)
    {
        $this->name = $name;
        $this->tickets = $tickets;
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->tickets->count(). ' Movie Ticket(s) Purchased Successfully!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.ticket-sold',
            with: [
                'name' => $this->name,
                'tickets'=> $this->tickets,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
