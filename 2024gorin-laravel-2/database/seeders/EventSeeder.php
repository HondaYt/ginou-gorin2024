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
        Event::insert([
            [
                'title' => '技能五輪',
                'address' => '愛知県名古屋市',
                'event_date' => '2024-11-06',
            ],
            [
                'title' => '若年者ものづくり',
                'address' => '群馬県',
                'event_date' => '2024-07-10',
            ],
            [
                'title' => 'クラス交流会',
                'address' => '大阪府',
                'event_date' => '2024-11-14',
            ],
            [
                'title' => 'ECC EXPO',
                'address' => '大阪府中崎町',
                'event_date' => '2025-02-20',
            ],
        ]);
    }
}
