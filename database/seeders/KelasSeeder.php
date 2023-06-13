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
                    'level' => 7,
                    'kelas' => "7-N-01",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-02",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-03",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-04",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-05",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-06",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-07",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-08",
                ],
                [
                    'level' => 7,
                    'kelas' => "7-N-09",
                ],
            ]
        );
    }
}
