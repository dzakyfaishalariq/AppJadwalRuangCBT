<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        $jam_awal = ['08:00', '10:00', '13:00', '15:00'];
        $jam_akhir = ['09:30', '11:30', '14:30', '16:30'];
        for ($i = 0; $i < 4; $i++) {
            $k = $i + 1;
            $hari = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
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
