<?php

namespace App\Http\Controllers\Site;

use App\Entry;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $entries = Entry::withUserInfo()->orderBy('updated_at', 'DESC')->paginate(5);
        $lastJoinedUsers = User::lastJoined()->select(array('id', 'name', 'surname', 'twitter_username', 'created_at'))->get();

        return view('home', compact('entries', 'lastJoinedUsers'));
    }
}
