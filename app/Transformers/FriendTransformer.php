<?php

namespace App\Transformers;

use App\Models\Friend;
use League\Fractal\TransformerAbstract;

class FriendTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['users'];

    public function transform(Friend $friend)
    {
        return [
            'id' => $friend->id,
            'users' => $friend->users,
            'created_at' => $friend->created_at->toDateTimeString(),
            'updated_at' => $friend->updated_at->toDateTimeString(),
        ];
    }

    public function includeUsers(Friend $Friend)
    {
        return $this->collection($Friend->users, new UserTransformer());
    }
}