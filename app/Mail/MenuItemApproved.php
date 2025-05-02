<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\MenuItem;

class MenuItemApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $menuItem;

    /**
     * Tạo một thể hiện mới của lớp Mailable.
     *
     * @param MenuItem $menuItem
     * @return void
     */
    public function __construct(MenuItem $menuItem)
    {
        $this->menuItem = $menuItem;
    }

    /**
     * Xây dựng nội dung email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Món ăn đã được phê duyệt')
            ->view('Restaurant.page.Mail.menu_item_approved');
    }
}
