<?php

namespace App\Transformers;

use App\Models\FriendAsk;
use League\Fractal\TransformerAbstract;

class FriendAskTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user'];

    public function transform(FriendAsk $friendAsk)
    {
     
        return [
            'id' => $friendAsk->id,
            'user' => $friendAsk->user(),
            'content' => $friendAsk->content,
            'status' => $friendAsk->status,
            'created_at' => $friendAsk->created_at->toDateTimeString(),
            'updated_at' => $friendAsk->updated_at->toDateTimeString(),
        ];
    }

    public function includeUser(FriendAsk $FriendAsk)
    {
        return $this->item($FriendAsk->user, new UserTransformer());
    }

}