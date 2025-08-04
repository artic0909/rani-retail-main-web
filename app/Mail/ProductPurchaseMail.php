<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductPurchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $billDetails;
    public $pdfData;

    public function __construct($billDetails, $pdfData = null)
    {
        $this->billDetails = $billDetails;
        $this->pdfData = $pdfData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Purchase Bill - Thank you!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product-purchase-mail',
            with: ['billDetails' => $this->billDetails],
        );
    }

    public function attachments(): array
    {
        if ($this->pdfData) {
            return [
                \Illuminate\Mail\Mailables\Attachment::fromData(fn() => $this->pdfData, 'purchase_bill.pdf')
                    ->withMime('application/pdf'),
            ];
        }

        return [];
    }
}
