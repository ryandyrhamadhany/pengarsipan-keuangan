<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BudgetSubmitToReturnNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $senderverifikator, public $senderverifikatoremail,)
    {
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
            ->subject('Pengajuan dikembalikan oleh' . $this->senderverifikator)
            ->greeting('Halo ' . $notifiable->name)
            ->line('Pengajuan Anda ditolak dan dikembalikan oleh')
            ->line('Nama: ' . $this->senderverifikator)
            ->line('email: ' . $this->senderverifikatoremail)
            ->line('Pengajuan Anda dikembalikan silahkan untuk memperbaiki pengajuan anda')
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
