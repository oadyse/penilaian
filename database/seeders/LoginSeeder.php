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
                    'name' => 'SuperAdmin',
                    'username' => 'admin',
                    'role' => 'admin',
                    'password' => '123456',
                ],
                [
                    'name' => 'Nur Fitrianti Fahrudin S.Kom., M.T.',
                    'username' => 'guru',
                    'role' => 'guru',
                    'password' => '123456',
                ],
                [
                    'name' => 'Rizvan',
                    'username' => 'rizvan',
                    'role' => 'siswa',
                    'password' => '123456',
                ],
            ]
        );
    }
}
