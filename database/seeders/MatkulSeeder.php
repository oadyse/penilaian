<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul')->insert(
            [
                [
                    'matkul' => 'Sistem Informasi Berbasis Web - Praktikum',
                    'sks' => '4',
                    'semester' => '1',
                    'id_kelas' => '1',
                    'id_matkul' => '1',
                ],
            ]
        );
    }
}
