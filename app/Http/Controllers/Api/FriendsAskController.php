<?php

namespace App\Http\Controllers\Api;

use App\Models\FriendAsk;
use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\FriendAskTransformer;
use App\Http\Requests\Api\FriendAskRequest;

class FriendsAskController extends Controller
{
    public function index(FriendAskRequest $request)
    {
        //
    }

    public function store(FriendAskRequest $request, FriendAsk $friendAsk)
    {
        $friendAsk->fill($request->all());
        $friendAsk->user_id = $this->user()->id;
        $friendAsk->save();

        return $this->response->item($friendAsk, new FriendAskTransformer())
            ->setStatusCode(201);
    }

    public function update(FriendAskRequest $request, FriendAsk $friendAsk) 
    {
        $this->authorize('update', $friendAsk);

        $friendAsk->update($request->all());
        return $this->response->item($friendAsk, new FriendAskTransformer());
    }
}
