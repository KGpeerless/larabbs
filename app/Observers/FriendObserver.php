<?php

namespace App\Observers;

use App\Models\Friend;
use App\Models\User;
use App\Models\Group;
use App\Models\Message;
use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class FriendObserver
{
    public function creating(Friend $friend)
    {
        //
    }

    public function created(Friend $friend)
    {        
        //
    }

    public function updating(Friend $friend)
    {
        //
    }

    public function saving(Friend $friend)
    {
        //
    }

    public function saved(Friend $friend)
    {
        //
    }
}