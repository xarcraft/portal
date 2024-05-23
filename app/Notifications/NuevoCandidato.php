<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_oferta, $nombre_oferta, $usuario_id)
    {
        $this->id_oferta = $id_oferta;
        $this->nombre_oferta = $nombre_oferta;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Alguien se ha postulado a tu oferta')
            ->line('Nombre de la oferta: ' . $this->nombre_oferta)
            ->action('Ver Notificaciones', url('/notificaciones'))
            ->line('Gracias por ser parte de S.I Nova Gestión');
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

    public function toDatabase($notifiable)
    {
        return [
            'id_oferta' => $this->id_oferta,
            'nombre_oferta' => $this->nombre_oferta,
            'usuario_id' => $this->usuario_id,
        ];
    }
}
