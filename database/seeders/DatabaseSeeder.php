<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       //  \App\Models\User::factory(10)->create();
       User::create([
        'user_id' => 244,
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'is_admin' => 1,
        'password' => Hash::make('password'), // Hash the password
        'number' => '0808',
    ]);

    User::create([
        'user_id' => 24,
        'name' => 'test',
        'email' => 'test@gmail.com',
        'is_admin' => 0,
        'password' => Hash::make('password'),
        'number' => '080',
    ]);
    }
}
