<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HiddenTweet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'tweet_id', 'created_at'
    ];

    public static function changeStatus($tweetId) {
        if (self::isVisible($tweetId)) {
            $data = array();
            $data['user_id'] = Auth::user()->id;
            $data['tweet_id'] = $tweetId;
            self::create($data);
            return true;
        }
        else {
            self::where('tweet_id', '=', $tweetId)->delete();
            return false;
        }
    }

    public static function isVisible($tweetId) {
        $hiddenTweet = self::where('tweet_id', '=', $tweetId)->first();
        if ($hiddenTweet) {
            return false;
        }
        return true;
    }
}
