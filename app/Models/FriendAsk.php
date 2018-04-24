<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FriendAsk extends Model
{
    use Notifiable {
        notify as protected laravelNotify;
    }

    protected $table = 'friends_ask';
    protected $fillable = ['user_id', 'friend_user_id', 'content', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friendUser()
    {
        return $this->belongsTo(User::class, 'friend_user_id', 'id');
    }
}
