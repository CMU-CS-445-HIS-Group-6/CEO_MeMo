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
        \App\Models\User::create([
            'email' => 'account1@gmail.com',
        ]);
        \App\Models\User::create([
            'email' => 'account2@gmail.com',
        ]);
        \App\Models\User::create([
            'email' => 'account3@gmail.com',
        ]);
    }
}
