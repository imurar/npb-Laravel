<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_positions')->insert([
            ['id' => 1, 'name' => '投手'],
            ['id' => 2, 'name' => '捕手'],
            ['id' => 3, 'name' => '一塁手'],
            ['id' => 4, 'name' => '二塁手'],
            ['id' => 5, 'name' => '三塁手'],
            ['id' => 6, 'name' => '遊撃手'],
            ['id' => 7, 'name' => '左翼手'],
            ['id' => 8, 'name' => '中堅手'],
            ['id' => 9, 'name' => '右翼手']
        ]);
    }
}
