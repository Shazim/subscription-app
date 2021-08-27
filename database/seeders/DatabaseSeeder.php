<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Website::create(['name' => 'Wbeiste 1']);
        \App\Models\Website::create(['name' => 'Wbeiste 2']);
        \App\Models\Website::create(['name' => 'Wbeiste 3']);

        \App\Models\User::create(['name' => 'Jon Snow', 'email' => 'iamshazim@gmail.com', 'password' => '123456']);
    }
}
