<?php

namespace App\Models;

class Message extends Model
{
    public $timestamps = false;
   
    protected $table = 'message';
    protected $fillable = [
        'user_id',
        'room_id',
        'status',
        'content',
        'created_at',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 获取最近24小时内的消息
     */
    public function getLatestMessage($room_id, $pageSize)
    {
        // $time = time() - config('room.latest_time');
        return $this->leftJoin('users', 'message.user_id' , '=' , 'users.id')
            ->select('message.content', 'message.created_at' , 'users.id as user_id' , 'users.name as user_name')
            ->where('message.room_id', '=' , $room_id)
            ->where('message.status', '=' , config('status.message.available'))
            // ->where('message.created_at', '>' , $time)
            // ->take($pageSize)
            ->get();
    }
}
