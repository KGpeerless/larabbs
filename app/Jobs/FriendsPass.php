<?php

namespace App\Jobs;

use Illuminate\Support\Facades\DB; 
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\Friend;
use App\Models\Group;
use App\Models\Message;

class FriendsPass implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $friend;

    public function __construct(Friend $friend)
    {
        $this->friend = $friend;
    }

    public function handle()
    {
        // 好友关系建立成功，创建聊天室
        $group = new Group;
        $group->save();

        foreach($this->friend->users as $user) {
            $group->users()->save($user);
        }

        // 向聊天室发送打招呼信息
        $message = new Message;
        $message->group_id = $group->id;
        $message->content = '你们已经是好友了，打个招呼吧！';
        $message->save();

        // 通知用户已经将对方加为好友
        // $friendAsk->notify(new FriendAskReplied($friendAsk));
    }
}