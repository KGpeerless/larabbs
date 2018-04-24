<?php

namespace App\Http\Controllers\Api;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\FriendTransformer;
use App\Http\Requests\Api\FriendRequest;

class FriendsController extends Controller
{
    public function index(Request $request)
    {
        //
    }


    public function store(FriendRequest $request, Friend $friend)
    {
        $friend->fill($request->all());
        $friend->user_id = $this->user()->id;
        $friend->save();

        return $this->response->item($friend, new FriendTransformer())
            ->setStatusCode(201);
    }
}