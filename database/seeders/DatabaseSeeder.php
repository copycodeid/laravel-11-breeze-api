<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        $users = collect([
            [
                'name' => 'Mario',
                'email' => 'mariomad2296@gmail.com',
                'username' => 'mario46_',
            ],
            [
                'name' => 'Fitra',
                'email' => 'fitra@gmail.com',
                'username' => 'fitra46_',
            ],
        ]);

        $users->each(fn ($user) => User::factory()->create($user));

        User::factory(1000)->create();
    }
}
