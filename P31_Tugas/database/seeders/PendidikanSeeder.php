<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pendidikan = [
            ['jenis_pendidikan' => 'SMA'],
            ['jenis_pendidikan' => 'Diploma (D-III)'],
            ['jenis_pendidikan' => 'Sarjana (D-IV/S-I)'],
            ['jenis_pendidikan' => 'Magister (S-II)'],
            ['jenis_pendidikan' => 'Doktor (D-III)']
        ];

        DB::table('pendidikan')->insert($pendidikan);
    }
}
