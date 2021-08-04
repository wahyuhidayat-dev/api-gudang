<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('karyawans')->insert([
        	'name' => 'Joni',
        	'nik' => '12345',
        	'password' => '12345',
        ]);
    }
}
