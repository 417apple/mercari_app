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
        User::factory()->create([
            'name' => 'yuri',
            'email' => 'test@test.test',
            'email_verified_at' => now(),
            'password' => Hash::make('testtest'),
        ]);

        User::factory(10)->create();
    }
}
