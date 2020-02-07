<?php

namespace App\Http\Controllers\Site;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Entry;
use App\HiddenTweet;
use App\Http\Controllers\Controller;
use App\Services\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $entries = Entry::fromLoggedInUser()->withUserInfo()->orderBy('updated_at', 'DESC')->paginate(5);

        $tw_connection = new TwitterOAuth(
            Constants::TWITTER_CONSUMER_KEY,
            Constants::TWITTER_CONSUMER_SECRET,
            Constants::TWITTER_OAUTH_TOKEN,
            Constants::OAUTH_TOKEN_SECRET);

        if (Auth::user()->twitter_username != '') {
            $tweets = $tw_connection->get("statuses/user_timeline",
                ["screen_name" => str_replace('@', '', Auth::user()->twitter_username), "sort_by" => 'DESC', "count" => 15, "exclude_replies" => true]);

            if (isset($tweets->errors) || isset($tweets->error)) {
                $tweets = [];
            }

            foreach ($tweets as $tweet) {
                $tweet->belongs_to_logged_in_user = true;
                $tweet->visible = HiddenTweet::isVisible($tweet->id_str);
            }
        }
        else {
            $tweets = [];
        }

        return view('entries.index', compact('entries','tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('entries.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Entry::create($data);

        return redirect('entries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\View\View
     */
    public function edit(Entry $entry)
    {
        $result = $this->validatePermissions($entry);
        if (!$result) { abort(403); }

        return view('entries.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Entry $entry)
    {
        $result = $this->validatePermissions($entry);
        if (!$result) { abort(403); }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $data = $request->all();

        // Security
        unset($data['user_id']);

        $entry = Entry::find($entry->id);
        $entry->update($data);

        return redirect('entries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        //
    }

    private function validatePermissions($entry) {
        return $entry->user_id == Auth::user()->id;
    }
}
