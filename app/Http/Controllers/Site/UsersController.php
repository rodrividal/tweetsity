<?php

namespace App\Http\Controllers\Site;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Entry;
use App\HiddenTweet;
use App\Services\Constants;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function create()
    {
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        $entries = Entry::fromUser($user->id)->withUserInfo()->orderBy('updated_at', 'DESC')->paginate(5);

        $tw_connection = new TwitterOAuth(
            Constants::TWITTER_CONSUMER_KEY,
            Constants::TWITTER_CONSUMER_SECRET,
            Constants::TWITTER_OAUTH_TOKEN,
            Constants::OAUTH_TOKEN_SECRET);

        $tweetsToShow = array();
        if ($user->twitter_username != '') {
            $tweets = $tw_connection->get("statuses/user_timeline",
                ["screen_name" => str_replace('@', '', $user->twitter_username), "sort_by" => 'DESC', "count" => 15, "exclude_replies" => true]);

            if (isset($tweets->errors) || isset($tweets->error)) {
                $tweets = [];
            }
            foreach ($tweets as $tweet) {
                if ($user->id == Auth::user()->id) {
                    $tweet->belongs_to_logged_in_user = true;
                    $tweet->visible = HiddenTweet::isVisible($tweet->id_str);
                    $tweetsToShow[] = $tweet;
                }
                else if (HiddenTweet::isVisible($tweet->id_str)) {
                    $tweet->visible = true;
                    $tweetsToShow[] = $tweet;
                }
            }
        }

        $tweets = $tweetsToShow;

        return view('users.show', compact('entries','tweets', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\View\View
     */
    public function edit(User $User)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        $result = $this->validatePermissions($user);
        if (!$result) { abort(403); }

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'twitter_username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::find($user->id);
        $user->update($request->all());
        Auth::setUser($user);

        return redirect('users/' . $user->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort(403);
    }

    private function validatePermissions($user) {
        return $user->id == Auth::user()->id;
    }

    public function hideTweet(Request $request) {
        // Let's check this tweet belongs to the logged in user...
        $tw_connection = new TwitterOAuth(
            Constants::TWITTER_CONSUMER_KEY,
            Constants::TWITTER_CONSUMER_SECRET,
            Constants::TWITTER_OAUTH_TOKEN,
            Constants::OAUTH_TOKEN_SECRET);

        $tweetInfo = $tw_connection->get("statuses/show/" . $request->tweet_id, []);
        if (isset($tweetInfo->errors) || isset($tweetInfo->error)) {
            return response()->json([], 404);
        }

        $userFromTweet = $tweetInfo->user->screen_name;
        if (str_replace('@', '', strtolower($userFromTweet)) == str_replace('@', '', strtolower(Auth::user()->twitter_username))) {
            $hidden = HiddenTweet::changeStatus($request->tweet_id);
        }
        else {
            return response()->json([], 403);
        }

        return response()->json(['new' => $hidden], 200);
    }

}
