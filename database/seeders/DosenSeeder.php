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
                    'nama' => 'Nur Fitrianti Fahrudin S.Kom., M.T.',
                    'gender' => 'P',
                    'id_user' => '2',
                ],
            ]
        );

        DB::table('mengajar')->insert(
            [
                [
                    'id_matkul' => 1,
                    'id_dosen' => 1,
                ],
                [
                    'id_matkul' => 2,
                    'id_dosen' => 1,
                ],
            ]
        );

        DB::table('pengampu')->insert(
            [
                [
                    'id_kelas' => 1,
                    'id_dosen' => 1,
                ],
            ]
        );
    }
}
