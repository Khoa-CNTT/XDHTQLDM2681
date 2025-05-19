<?php

namespace App\Mail;

use App\Models\Restaurant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RestaurantApproved extends Mailable
{
    use Queueable, SerializesModels;
    public $restaurant;
    public $username;
    public $password;

    public function __construct($restaurant, $username, $password)
    {
        $this->restaurant = $restaurant;
        $this->username = $username;
        $this->password = $password;
    }
    public function build()
    {
        return $this->subject('Nhà hàng của bạn đã được phê duyệt')
            ->view('Admin.page.Email.Restaurant_approved'); // Tạo view email riêng
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Restaurant Approved',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Admin.page.Email.Restaurant_approved',
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
