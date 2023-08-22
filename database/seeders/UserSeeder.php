<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Min Myat Thu',
            'email' => 'min@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(11111111), // password
            'role' => "admin",
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Kyaw Zin Win',
            'email' => 'kyaw@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(11111111), // password
            'role' => "user",
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();

    }
}
