<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Entry;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EntriesTableSeeder extends Seeder
{
    public function run()
    {
        Entry::create([
            'user_id'  => 1,
            'title' => 'This is just an example',
            'content' => 'Amazing entry!!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 1,
            'title' => 'This is just another example',
            'content' => 'Wowwwww amazing entry again!!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 1,
            'title' => 'Improvements part 1',
            'content' => 'I would have liked to add location to the entries.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 1,
            'title' => 'Improvements part 2',
            'content' => 'I want the articles to have images.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 2,
            'title' => 'Kurt Suggestions',
            'content' => 'I want to share my content in Twitter automatically.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 2,
            'title' => 'Kurt Suggestions II',
            'content' => 'I love my music.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 3,
            'title' => 'Moon',
            'content' => 'Becoming a wolf while I am writing this.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 3,
            'title' => 'Pop king',
            'content' => 'I want to populate this blog.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 4,
            'title' => 'Oscar',
            'content' => 'I have some cool movies to share with you.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 4,
            'title' => 'Oscar',
            'content' => 'I am very famous!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Entry::create([
            'user_id'  => 5,
            'title' => 'Horror',
            'content' => 'What a character!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
