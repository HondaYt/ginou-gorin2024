<?php

namespace Database\Seeders;

use App\Models\Thumbnail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Thumbnail::insert([
            [
                'name'=>'111111111111111111',
                'article_id'=>1,
            ],
            [
                'name'=>'222222222222222222',
                'article_id'=>3,

            ],
        ]);
    }
}
