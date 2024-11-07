<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        Event::insert([
            [
                'title'=>'技能五輪',
                'address'=>'愛知県名古屋市',
                'event_date'=>'2024-11-06',
            ],
            [
                'title'=>'技能五輪2',
                'address'=>'愛知県',
                'event_date'=>'2024-11-07',
            ],
            [
                'title'=>'技能五輪3',
                'address'=>'愛知',
                'event_date'=>'2024-11-08',
            ],
        ]);

    }
}
