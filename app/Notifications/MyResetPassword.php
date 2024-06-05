<?php

namespace App\Notifications;

use HttpException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class MyResetPassword extends Notification
{
    use Queueable;

    public $token;
    public static $toMailCallback;


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
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');

        try{
            if (static::$toMailCallback) {
                return call_user_func(static::$toMailCallback, $notifiable, $this->token);
            }

            return (new MailMessage)
                ->subject('Recuperar contraseña')
                ->greeting('Hola!')
                ->line('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.')
                ->action('Recuperar contraseña', route('password.reset', $this->token))
                ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
                ->salutation('Saludos, '. config('app.name'))
                ;

        }catch (HttpException $e){
            Log::alert( 'Error en EMail: ' . $e->getMessage() );
            dd($e->getMessage());
        }

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
