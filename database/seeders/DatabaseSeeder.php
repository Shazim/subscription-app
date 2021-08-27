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
      foreach (range(1, 10) as $i) {
        \App\Models\Website::create(['name' => 'Website '.$i]);
      }

      \App\Models\User::create(['name' => 'Jon Snow', 'email' => 'jonsnow@gmail.com', 'password' => '123456']);
    }
}
