<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'admin_user_id'];

    public function adminUser()
    {
        return $this->belongsTo(User::class, 'admin_user_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_groups', 'group_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}