<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use Auth;

class GroupsController extends Controller
{
    public function index(Request $request, User $user, Link $link)
    {
        $groups = Auth::user()->groups()->with(['messages', 'messages.user', 'users'])->get();
        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();

        return view('groups.index', compact('active_users', 'links', 'groups'));
    }
}
