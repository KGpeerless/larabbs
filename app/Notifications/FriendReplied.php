<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FriendReplied extends Notification
{
    use Queueable;

    public $friendAsk;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(FriendAsk $friendAsk)
    {
        $this->friendAsk = $friendAsk;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        // 存入数据库里的数据
        return [
            'friend_ask_id' => $this->friendAsk->id,
            'friend_ask_content' => $this->friendAsk->content,
            'user_id' => $this->friendAsk->id,
            'friend_user_id' => $this->friendAsk->friend_user_id,
            'status' => $this->friendAsk->status,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('你的话题有新回复！');
    }
}
