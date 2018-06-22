<?php

namespace App\Models;

class RoomJoin extends Model
{
    public $timestamps = false;
    
    protected $table = 'room_join';
    protected $fillable = [
        'user_id',
        'room_id',
        'created_at',
        'updated_at',
        'status'
    ];

    public function memberNum($room_id)
    {
        return $this->where([
            'room_id' => $room_id,
            'status' => 0
        ])->count();
    }
}
