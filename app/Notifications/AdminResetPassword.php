<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AdminResetPassword extends ResetPassword
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  d$notifiable
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
            ->subject('Återställ Lösenordet')
            ->line('Du har fått det här mailet eftersom någon (förhoppningsvis du) har begärt en återställning av ditt lösenord på admin-panelen hos Makerspace Bokningssystem.')
            ->action('Återställ lösenord', url(config('app.url').route('password.reset', ['token' => $this->token], false)))
            ->line(Lang::getFromJson('Länken är giltig i :count minuter.', ['count' => config('auth.passwords.users.expire')]))
            ->line('Om det inte var du som begärde återställningen kan du ignorera det här mailet.');
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
