<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Kepala Sekolah',
                'nis' => '1234567890',
                'role' => 'kepala_sekolah',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Tata Usaha',
                'nis' => '1234567891',
                'role' => 'tata_usaha',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Kaprog Akl',
                'nis' => '1234567892',
                'role' => 'ketua_akuntansi',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Wali Kelas',
                'nis' => '1234567893',
                'role' => 'wali_kelas',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Wali Murid',
                'nis' => '1234567894',
                'role' => 'orang_tua',
                'password' => bcrypt('12345678')
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
