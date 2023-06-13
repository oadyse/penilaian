<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Eka',
                    'username' => 'admin',
                    'role' => 'admin',
                    'password' => '123456',
                ],
                [
                    'name' => 'Oady',
                    'username' => 'guru',
                    'role' => 'guru',
                    'password' => '123456',
                ],
                [
                    'name' => 'Abdan Syakuro Ananda Papalya bin Adin Papalya',
                    'username' => '20220113',
                    'role' => 'siswa',
                    'password' => '202201131',
                ],
            ]
        );
    }
}
