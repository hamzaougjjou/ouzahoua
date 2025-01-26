<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OrderCompleted extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     *
     * @param $order
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // يتم إرسال الإشعار إلى قاعدة البيانات
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        // البيانات التي سيتم تخزينها في قاعدة البيانات
        return [
            'order_id' => $this->order->id,
            'user_id' => $this->order->user_id,
            'title' => 'تم تأكيد طلبك',
            'content' => 'تم تأكيد طلبك بنجاج',
        ];

    }
}
