<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('articles')->insert([
        //     [
        //         'title'=>'サンプル1のタイトル',
        //         'body'=>'サンプル1の本文',
        //     ],
        //     [
        //         'title'=>'サンプル2のタイトル',
        //         'body'=>'サンプル2の本文',
        //     ],
        //     [
        //         'title'=>'サンプル3のタイトル',
        //         'body'=>'サンプル3の本文',
        //     ],
        // ]);
        Article::insert([
            [
                'title'=>'サンプル1のタイトル',
                'body'=>'サンプル1の本文',
            ],
            [
                'title'=>'サンプル2のタイトル',
                'body'=>'サンプル2の本文',
            ],
            [
                'title'=>'サンプル3のタイトル',
                'body'=>'サンプル3の本文',
            ],
        ]);
    }
}
