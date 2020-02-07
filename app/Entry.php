<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Entry extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'content', 'created_at', 'updated_at'
    ];

    public static function scopeWithUserInfo($query) {
        return $query->join('users', 'entries.user_id', '=', 'users.id')
            ->select(
                array(
                    'users.name as author_name',
                    'users.surname as author_surname',
                    'entries.id',
                    'entries.user_id',
                    'entries.title',
                    'entries.content',
                    'entries.updated_at')
            );
    }

    public static function scopeFromLoggedInUser($query) {
        return $query->where('user_id', Auth::user()->id);
    }

    public static function scopeFromUser($query, $userId) {
        return $query->where('user_id', $userId);
    }
}
