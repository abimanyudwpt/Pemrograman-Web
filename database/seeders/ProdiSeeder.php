<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Prodis')->insert([
            ['prodi' => 'Manajemen Informatika'],
            ['prodi' => 'Ilmu Komputer'],
            ['prodi' => 'Pendidikan Teknik Informatika'],
            ['prodi' => 'Sistem Informasi']
        ]);
    }
}