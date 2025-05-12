<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Jasur Sultonov',
            'email' => 'jasur-savdo@example.com',
            'password' => Hash::make('1202'),
        ]);
    }
}
