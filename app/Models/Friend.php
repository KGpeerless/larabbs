<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = ['group_id', 'status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_friends')->withPivot('name', 'status');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}