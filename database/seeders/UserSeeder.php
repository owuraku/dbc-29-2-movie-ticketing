<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create admin user
        User::create([
            'name' => 'Administrator One',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password') ,
            'role' => 'admin'
        ]);

        // create normal user
        User::create([
            'name' => 'First Customer',
            'email' => 'first@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password') ,
        ]);
    }
}
