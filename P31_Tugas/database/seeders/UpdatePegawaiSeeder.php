<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdatePegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //misal kita update data pegawai yang ada saat ini milik SMA
        DB::table('pegawai')->update(['pendidikan_id' => 1]);
    }
}
