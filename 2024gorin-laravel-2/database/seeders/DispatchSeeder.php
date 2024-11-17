<?php

namespace Database\Seeders;

use App\Models\Dispatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dispatch::insert([
            [
                'event_id' => 1,
                'worker_id' => 1,
                'approval' => false,
            ],
            [
                'event_id' => 2,
                'worker_id' => 2,
                'approval' => true,
            ],
            [
                'event_id' => 2,
                'worker_id' => 3,
                'approval' => false,
            ],
            [
                'event_id' => 3,
                'worker_id' => 1,
                'approval' => true,
            ],
            [
                'event_id' => 3,
                'worker_id' => 2,
                'approval' => false,
            ],
        ]);
    }
}
