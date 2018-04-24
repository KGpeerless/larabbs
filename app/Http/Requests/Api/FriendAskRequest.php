<?php

namespace App\Http\Requests\Api;

class FriendAskRequest extends FormRequest
{
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    'friend_user_id' => 'required|exists:users,name',
                ];
                break;
            case 'PATCH':
                return [
                    'status' => 'integer'
                ];
                break;
        }
    }
}