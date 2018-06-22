<?php

namespace App\Models;

use Auth;

class Room extends Model
{
    public $timestamps = false;

    protected $table = 'room';

    protected $fillable = [
        'user_id',
        'title',
        'created_at',
        'updated_at',
        'is_private',
        'cipher',
        'cover'
    ];

    public function message()
    {
        return $this->hasMany(Message::class);
        // return $this->morphMany(Message::class , 'room');
    }

    public function checkUserJoined($roomId, RoomJoin $join)
    {
        return $join->where([
            ['status', '=', config('status.room_join.available')],
            ['user_id', '=', Auth::user()->id],
            ['room_id', '=', $roomId]
        ])->exists();
    }
}
