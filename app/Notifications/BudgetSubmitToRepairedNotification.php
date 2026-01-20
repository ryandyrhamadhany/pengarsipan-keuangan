<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BudgetSubmitToRepairedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public $sendername,
        public $senderemail,
        public $senderdivisi,
        public $receivername,
        public $receiveremail
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Pengajuan telah diperbaiki oleh' . $this->sendername)
            ->greeting('Halo ' . $notifiable->name)
            ->line('Pengajuan telah diperbaiki oleh')
            ->line('Nama: ' . $this->sendername)
            ->line('email: ' . $this->senderemail)
            ->line('divisi: ' . $this->senderdivisi)
            ->line('Pengajuan ini telah diperbaiki silahkan untuk diperiksa oleh atas nama anda')
            ->line('Nama: ' . $this->receivername)
            ->line('email: ' . $this->receiveremail)
            ->action('Buka web untuk periksa', url('/'))
            ->line('Terima kasih');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
