<?php

namespace App\Transformers;

use App\Models\Friend;
use League\Fractal\TransformerAbstract;

class FriendTransformer extends TransformerAbstract
{
    public function transform(Friend $friend)
    {
        return [
            'id' => $friend->id,
            'created_at' => $friend->created_at->toDateTimeString(),
            'updated_at' => $friend->updated_at->toDateTimeString(),
        ];
    }
}