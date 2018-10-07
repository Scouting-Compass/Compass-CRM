<?php

namespace ActivismeBe\Notifications\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class LoginCreated
 *
 * @package ActivismeBe\Notifications\Users
 */
class LoginCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The variable that holds the generated password.
     *
     * @var string $password
     */
    public $password;

    /**
     * Create a new notification instance.
     *
     * @param  string $password The generated password for the user.
     * @return void
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via(): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable The entity form the user that receive the notification.
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('There is created an login for u on ' . config('app.name'))
            ->greeting('Hello,')
            ->line('A administrator has created an login for u on '  . config('app.name'))
            ->line("You can login with the following password: `{$this->password}`")
            ->action('login', route('login'));
    }
}
