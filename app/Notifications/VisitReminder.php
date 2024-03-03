<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VisitReminder extends Notification
{
    use Queueable;

    public function toMail($notifiable)
{
    return (new MailMessage)
        ->subject('Notification Mail') // Aggiunge un oggetto personalizzato
        ->greeting('Hello!') // Aggiunge un saluto personalizzato
        ->line('We are contacting you to remind you that 60 days have passed since your last visit. We encourage you to give us a call or visit our website to schedule an appointment and undergo a routine check-up.')
        ->action('Click Here!', url('http://localhost:8000/'))
        ->line('Thank you!')
        ->salutation('Best regards, Clinica Rossi'); // Aggiunge una conclusione personalizzata
}

    public function via($notifiable)
    {
        return ['mail']; 
    }

}
