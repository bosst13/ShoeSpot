<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Orderinfo;
use App\Models\Orderline;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Receipt extends Mailable
{
    use Queueable, SerializesModels;
    public $customer;
    public $orderinfo;
    public $orderlines;

    /**
     *@param Customer $customer
     * @param Orderinfo $orderinfo
     * @param OrderLine[] $orderlines
     */
    public function __construct(Customer $customer, Orderinfo $orderinfo, $orderlines)
    {
        $this->customer = $customer;
        $this->orderinfo = $orderinfo;
        $this->orderlines = $orderlines;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Receipt',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'receipt',
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
