<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create free account
        User::create([
            'username' => 'freeUser',
            'email' => 'freeUser@eva.com',
            'password' => Hash::make('Password123456'),
            'account_type' => 1
        ]);

        // create premium account
        User::create([
            'username' => 'premiumUser',
            'email' => 'premiumUser@eva.com',
            'password' => Hash::make('Password123456'),
            'account_type' => 2
        ]);

    }
}
