<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BudgetSubmitToBendaharaNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public $sendername,
        public $senderemail,
        public $senderdivisi,
        public $senderverifikator,
        public $senderverifikatoremail,
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
            ->subject('Pengajuan Baru diverifikasi oleh ' . $this->senderverifikator)
            ->greeting('Halo ' . $notifiable->name)
            ->line('Ada pengajuan yang sudah di verifikasi oleh')
            ->line('Nama: ' . $this->sendername)
            ->line('email: ' . $this->senderemail)
            ->line('divisi: ' . $this->senderdivisi)
            ->line('di verifikasi oleh')
            ->line('Nama: ' . $this->senderverifikator)
            ->line('email: ' . $this->senderverifikatoremail)
            ->line('silakan diperiksa dan ditanda tangani pengajuan yang telah di verifikasi')
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
