<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert(
            [
                [
                    'nis' => 'M3119082',
                    'gender' => 'L',
                    'id_kelas' => '1',
                    'id_user' => '1',
                ],
            ]
        );
    }
}