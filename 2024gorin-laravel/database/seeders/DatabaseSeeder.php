<?php

namespace Database\Seeders;

use App\Models\Dispatche;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();

        User::factory()->create([
            // 'name' => 'Test User',
            'email' => 'admin@skilljapan.info',
            'password' => Hash::make('gorin'),
        ]);

        $this->call([
            EventSeeder::class,
            WorkersSeeder::class,
            DispatcheSeeder::class,
        ]);
    }
}
