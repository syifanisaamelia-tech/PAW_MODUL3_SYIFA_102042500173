<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun Pengguna LMS (1 Dosen & 1 Mahasiswa)
        // TODO 1: Buat akun awal untuk Dosen
        // Gunakan email sebagai identitas akun.
        // Lengkapi nama, password yang di-hash, role Dosen, dan nomor induk.
        User::updateOrCreate(
            ['email' => 'dosen@celoe.ac.id'],
            [
                'name' => 'Dosen',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'nomor_induk' => '198121009',
            ]
        );

        // Akun awal untuk Mahasiswa.
        User::updateOrCreate(
            ['email' => 'mahasiswa@celoe.ac.id'],
            [
                'name' => 'Mahasiswa',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'nomor_induk' => '102042500040',
            ]
        );
    }
}