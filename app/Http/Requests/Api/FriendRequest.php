<?php

namespace App\Http\Requests\Api;

class FriendRequest extends FormRequest
{
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    
                ];
                break;
        }
    }
}