<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('barangs')->insert([
        	'nama_barang' => 'aerosol',
        	'qty' => '180',
        	'keterangan' => 'bojong',
            'nama_lokasi' => 'Gudang A',
            'kode_barang' => '0005',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
    }
}
