<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class denegado extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
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
            ->line('lamentablemente tu oferta no cumple con las metricas establecidas para ser publicada, te invitamos a leer nuestro articulo de parametros de publicación e intentarlo de nuevo.')
            ->line('O puedes ponerte en contacto con el soporte tecnico de la empresa para obtener guia en la publicacion de la misma.')
            ->line('Gracias por ser parte de S.I Nova Gestión');
    }
}
