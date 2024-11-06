<?php

namespace Database\Seeders;

use App\Models\Workers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Workers::insert([
            [
                'name'=>'user01',
                'email'=>'user01@gorin.com',
                'password'=>Hash::make('2024'),
            ],
            [
                'name'=>'user02',
                'email'=>'user02@gorin.com',
                'password'=>Hash::make('2024'),
            ],
            [
                'name'=>'user03',
                'email'=>'user03@gorin.com',
                'password'=>Hash::make('2024'),
            ],
        ]);
    }
}
