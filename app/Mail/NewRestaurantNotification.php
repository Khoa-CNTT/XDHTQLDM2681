<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewRestaurantNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $restaurant;
    /**
     * Create a new message instance.
     */
    public function __construct($restaurant)
    {
        $this->restaurant = $restaurant;
    }
    public function build()
    {
        return $this->subject('Thông báo: Nhà hàng mới đăng ký')
            ->view('Restaurant.page.Mail.new_restaurant')
            ->with([
                'Name' => $this->restaurant->name,
                'email' => $this->restaurant->email,
                'phone' => $this->restaurant->PhoneNumber,
                'businessType' => $this->restaurant->business_type,
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Restaurant Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Restaurant.page.Mail.new_restaurant',
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
