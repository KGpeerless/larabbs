<?php

namespace App\Observers;

use App\Models\FriendAsk;
use App\Models\Friend;
use App\Models\User;
use App\Models\Group;
use App\Models\Message;
use App\Jobs\FriendsPass;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class FriendAskObserver
{
    public function creating(FriendAsk $friendAsk)
    {
        // 用户是否存在
        $friendUser = User::where('name', $friendAsk->friend_user_id)->first();

        if (!$friendUser) {
            return false;
        }

        $friendAsk->friend_user_id = $friendUser->id;
        $friendAsk->content = is_null($friendAsk->content) ? '您好！' : $friendAsk->content;

        // 是否为好友关系
    }

    public function updated(FriendAsk $friendAsk)
    {
        // 建立好友关系
        $friend = new Friend;
        $friend->status = 1;
        $friend->save();

        $users = [
            User::find($friendAsk->user_id), 
            User::find($friendAsk->friend_user_id)
        ];
        
        foreach ($users as $user) {
            $friend->users()->attach($user, ['name' => '', 'status' => 1]);
        }

        // 处理好友通过后的队列
        dispatch(new FriendsPass($friend));
    }
}