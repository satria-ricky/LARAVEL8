<?php

namespace Database\Seeders;

use App\Models\JenisBengkel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        // \App\Models\JenisBengkel::factory()->create();
        \App\Models\Bengkel::factory(5)->create();
        
        $jenisBengkel = [
            [
                'id_jenis_bengkel' => 1,
                'nama_jenis' => 'Bengkel Resmi',
            ],
            [
                'id_jenis_bengkel' => 2,
                'nama_jenis' => 'Bengkel Tidak Resmi'
            ]
       ];

       foreach ($jenisBengkel as $j) {
           JenisBengkel::create($j);
       }
    }
}
