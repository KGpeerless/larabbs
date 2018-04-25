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
        $firends = $this->user()->friends()->paginate(20);

        return $this->response->paginator($firends, new FriendTransformer);
    }
}