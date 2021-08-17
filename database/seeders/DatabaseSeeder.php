<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::create([
            'name' => "Syahrul",
            'username' => "usyahrul-25",
            'email' => "arulprojectdualima@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("dua_lima"), // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory()->hasStatus(5)->count(10)->create();
    }
}
