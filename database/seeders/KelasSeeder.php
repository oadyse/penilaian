<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert(
            [
                // 7 N
                [
                    'semester' => 1,
                    'kelas' => "A",
                    'tahun' => 2023,
                ],
                [
                    'semester' => 1,
                    'kelas' => "B",
                    'tahun' => 2023,
                ],
                [
                    'semester' => 1,
                    'kelas' => "C",
                    'tahun' => 2023,
                ],
                
            ]
        );
    }
}
