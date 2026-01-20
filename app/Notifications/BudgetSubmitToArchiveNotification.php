<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BudgetSubmitToArchiveNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $sendername, public $senderemail)
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
            ->subject('Pengajuan sudah di selasai oleh bendahara' . $this->sendername)
            ->greeting('Halo ' . $notifiable->name)
            ->line('Pengajuan Anda sudah ditanda tangani oleh bendahara')
            ->line('Nama: ' . $this->sendername)
            ->line('email: ' . $this->senderemail)
            ->line('Pengajuan Anda sudah selesai dan ditanda tangani oleh bendahara silahkan lihat hasilnya')
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
