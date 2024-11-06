<?php

namespace Database\Seeders;

use App\Models\Dispatche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispatcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Dispatche::insert([
            [
                'event_id'=>1,
                'worker_id'=>1,
            ],
            [
                'event_id'=>1,
                'worker_id'=>2,
            ],
            [
                'event_id'=>1,
                'worker_id'=>3,
            ],
        ]);
    }
}
