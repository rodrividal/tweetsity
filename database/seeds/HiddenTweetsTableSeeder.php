<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Entry;
use App\HiddenTweet;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HiddenTweetsTableSeeder extends Seeder
{
    public function run()
    {
        HiddenTweet::create([
            'user_id'  => 1,
            'tweet_id' => '1061806902827347968',
            'created_at' => Carbon::now()
        ]);
        HiddenTweet::create([
            'user_id'  => 1,
            'tweet_id' => '1084946054494277634',
            'created_at' => Carbon::now()
        ]);
        HiddenTweet::create([
            'user_id'  => 2,
            'tweet_id' => '834103150688743426',
            'created_at' => Carbon::now()
        ]);
        HiddenTweet::create([
            'user_id'  => 2,
            'tweet_id' => '831928317360078848',
            'created_at' => Carbon::now()
        ]);
        HiddenTweet::create([
            'user_id'  => 2,
            'tweet_id' => '831563672996691968',
            'created_at' => Carbon::now()
        ]);
        HiddenTweet::create([
            'user_id'  => 3,
            'tweet_id' => '13007071611985920',
            'created_at' => Carbon::now()
        ]);
        HiddenTweet::create([
            'user_id'  => 3,
            'tweet_id' => '110943334817734657',
            'created_at' => Carbon::now()
        ]);
        HiddenTweet::create([
            'user_id'  => 3,
            'tweet_id' => '2412781442',
            'created_at' => Carbon::now()
        ]);
    }
}
