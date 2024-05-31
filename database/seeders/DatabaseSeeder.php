<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pengguna;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::truncate();
        $penggunaList = Pengguna::with('pegawai')->where('STATUS', '1')->get();
        foreach ($penggunaList as $pengguna) {
            if ($pengguna->pegawai) {
                $nama = $pengguna->pegawai->nama_lengkap;
                $tanggalLahir = $pengguna->pegawai->TANGGAL_LAHIR;
                if ($tanggalLahir) {
                    $tanggalLahir = Carbon::createFromFormat('Y-m-d H:i:s', $tanggalLahir)->format('dmY');
                } else {
                    $tanggalLahir = '12345678';
                }
            } else {
                $nama = 'anonymous';
                $tanggalLahir = '12345678';
            }

            User::factory()
                ->withUsername($pengguna->LOGIN)
                ->withName($nama)
                ->withPassword($tanggalLahir)
                ->create();
        }
    }
}
