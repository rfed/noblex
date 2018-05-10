<?php

namespace Noblex\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from($notifiable->email, 'Noblex')
                    ->subject('Solicitud de reestablecimiento de contraseña')
                    ->greeting('Hola '.$notifiable->name.' ! ')
                    ->line('Recibes este email porque se solicitó un reestablecimiento de contraseña para tu cuenta.')
                    ->action('Reestablecer contraseña', config('app.url').route('password.reset', $this->token, false))
                    ->line('Si no realizaste esta petición, puedes ignorar este correo y nada habrá cambiado.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
