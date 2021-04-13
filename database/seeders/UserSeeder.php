<?php

namespace Database\Seeders;

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
        $users = [
            ['username' => 'ruben', 'password' => Hash::make('1234'), 'email' => 'admin@piracyScrapper.com'],
            ['username' => 'pablo', 'password' => Hash::make('1234'), 'email' => 'pablardo@gmail.com'],

        ];
        foreach($users as $user){
            \App\Models\User::create($user);
        }
    }
}
