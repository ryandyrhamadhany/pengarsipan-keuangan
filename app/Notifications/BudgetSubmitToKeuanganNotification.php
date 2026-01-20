<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BudgetSubmitToKeuanganNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public $senderName,
        public $senderEmail,
        public $senderDivisi,
    ) {}

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
            ->subject('Pengajuan Baru Oleh ' . $this->senderName)
            ->greeting('Halo ' . $notifiable->name)
            ->line('Nama: ' . $this->senderName)
            ->line('email: ' . $this->senderEmail)
            ->line('divisi: ' . $this->senderDivisi)
            ->line('Telah mengirim pengajuan silakan diperiksa')
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
