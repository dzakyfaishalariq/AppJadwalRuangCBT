<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\JatwalRuanganTersedia;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'prodi' => 'Fakultas Keperawatan',
            'nama' => 'Budi Setiyawan',
            'tingkat' => 1,
            'email' => 'budi@gmail.com',
            'password' => bcrypt('budi12345'),
        ]);
        User::create([
            'prodi' => 'STR Kebidanan',
            'nama' => 'Erlin Kurnia',
            'tingkat' => 2,
            'email' => 'Erlin@gmail.com',
            'password' => bcrypt('Erlin12345'),
        ]);
        User::create([
            'prodi' => 'D3 Gizi',
            'nama' => 'Andi Gustiyo',
            'tingkat' => 4,
            'email' => 'Andi@gmail.com',
            'password' => bcrypt('Andi12345'),
        ]);

        // admin

        Admin::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12345'),
        ]);

        $jam_awal = ['08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00'];
        $jam_akhir = ['09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00'];
        for ($i = 0; $i < 7; $i++) {
            $k = $i + 1;
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            for ($j = 0; $j < 7; $j++) {
                JatwalRuanganTersedia::create([
                    'jam_awal' => $jam_awal[$i],
                    'jam_akhir' => $jam_akhir[$i],
                    'sesi' => $k,
                    'hari' => $hari[$j],
                    'status' => false
                ]);
            }
        }
    }
}
