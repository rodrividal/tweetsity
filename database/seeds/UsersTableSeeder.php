<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 1,
            'name'  => 'Rodrigo',
            'surname' => 'Vidal',
            'username' => 'rodrigoovidal',
            'twitter_username' => 'rodrigoovidal',
            'email'     => 'rodrigovidal05@gmail.com',
            'password'  => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::create([
            'id' => 2,
            'name'  => 'Kurt',
            'surname' => 'Cobain',
            'username' => 'kurtcobain',
            'twitter_username' => 'kurtcobain',
            'email'     => 'kurtcobain@gmail.com',
            'password'  => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::create([
            'id' => 3,
            'name'  => 'Michael',
            'surname' => 'Jackson',
            'username' => 'michaeljackson',
            'twitter_username' => 'micheljackson',
            'email'     => 'michaeljackson@gmail.com',
            'password'  => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::create([
            'id' => 4,
            'name'  => 'John',
            'surname' => 'Travolta',
            'username' => 'johntravolta',
            'twitter_username' => 'johntravolta',
            'email'     => 'johntravolta@gmail.com',
            'password'  => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::create([
            'id' => 5,
            'name'  => 'Freddy',
            'surname' => 'Krugger',
            'username' => 'freddykrugger',
            'twitter_username' => 'freddykrugger',
            'email'     => 'freddykrugger@gmail.com',
            'password'  => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
