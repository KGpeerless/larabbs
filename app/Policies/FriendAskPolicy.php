<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FriendAsk;

class UserPolicy extends Policy
{
    public function update(User $currentUser, FriendAsk $friendAsk)
    {
        return $currentUser->id === $friendAsk->friend_user_id;
    }
}
