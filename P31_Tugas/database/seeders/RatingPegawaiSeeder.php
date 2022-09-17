<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RatingPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indikator = [
            [
                'indikator' => 'Kualitas',
                'nilai' => 80,
                'jam_kerja' => 20,
                'masa_dinas' => 5,
            ],
            [
                'indikator' => 'Pelayanan',
                'nilai' => 85,
                'jam_kerja' => 40,
                'masa_dinas' => 5,
            ],
            [
                'indikator' => 'Sikap',
                'nilai' => 90,
                'jam_kerja' => 30,
                'masa_dinas' => 5,
            ],
            [
                'indikator' => 'Etos Kerja',
                'nilai' => 95,
                'jam_kerja' => 40,
                'masa_dinas' => 5,
            ],
        ];
        DB::table('rating_pegawai')->insert($indikator);
    }
}
