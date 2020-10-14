<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
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
            ->from('smartjastar@gmail.com','SmartJastar')
            ->greeting('Сәлеметсізбе!')
            ->subject(Lang::get('Құпиясөзді қалпына келтіру'))
            ->line('Сіз бұл хатты аласыз, өйткені біз сіздің есептік жазбаңызға құпия сөзді қалпына келтіруді сұрадық.')
            ->action('Құпиясөзді қалпына келтіру', url(env('APP_DOMAIN',null).route('password.reset', [$this->token, $notifiable->email], false)))
            ->salutation('Құрметпен,  SmartJastar');

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
