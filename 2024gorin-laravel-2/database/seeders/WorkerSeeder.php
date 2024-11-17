<?php

namespace Database\Seeders;

use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Worker::insert([
            [
                'name' => 'user01',
                'email' => 'user01@skilljapan.info',
                'password' => Hash::make('users'),
            ],
            [
                'name' => 'user02',
                'email' => 'user02@skilljapan.info',
                'password' => Hash::make('users'),
            ],
            [
                'name' => 'user03',
                'email' => 'user03@skilljapan.info',
                'password' => Hash::make('users'),
            ],
        ]);
    }
}
