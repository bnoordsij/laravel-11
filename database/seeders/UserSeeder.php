<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->createMainUser();
    }

    private function createMainUser(): void
    {
        $email = 'test@example.com';
        if (User::query()->where('email', $email)->exists()) {
            return;
        }

        User::factory()->create([
            'name' => 'Test user',
            'email' => $email,
            'password' => Hash::make('secret123'),
        ]);
    }
}
