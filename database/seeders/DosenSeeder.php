<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->insert(
            [
                [
                    'nik' => '1234567890',
                    'gender' => 'P',
                    'id_kelas' => '1',
                    'id_matkul' => '1',
                ],
            ]
        );
    }
}
