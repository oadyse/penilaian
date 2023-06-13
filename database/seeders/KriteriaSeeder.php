<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria')->insert(
            [
                [
                    'index' => 1,
                    'kriteria' => 'Tidak mengumpulkan tugas',
                ],
                [
                    'index' => 2,
                    'kriteria' => 'Memenuhi 1 indikator',
                ],
                [
                    'index' => 3,
                    'kriteria' => 'Memenuhi 2 indikator',
                ],
                [
                    'index' => 4,
                    'kriteria' => 'Memenuhi 3 indikator',
                ],
                [
                    'index' => 5,
                    'kriteria' => 'Memenuhi 4 indikator',
                ],
                [
                    'index' => 6,
                    'kriteria' => 'Memenuhi 5 indikator',
                ],
                [
                    'index' => 7,
                    'kriteria' => 'Memenuhi 6 indikator',
                ],
                [
                    'index' => 8,
                    'kriteria' => 'Memenuhi 7 indikator',
                ],
            ]
        );
    }
}
