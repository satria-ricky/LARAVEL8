<?php

namespace Database\Seeders;

use App\Models\Aset;
use App\Models\User;
use App\Models\JenisAset;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Aset::factory(5)->create();
        // JenisAset::factory(5)->create();

        $jenis =  [
            [
                'jenis_id' => 1390101,
                'jenis_nama' => 'Tanah Bangunan Kantor',
            ],
            [
                'jenis_id' => 1390102,
                'jenis_nama' => 'Tanah Rumah Dinas',
            ],
            [
                'jenis_id' => 1390201,
                'jenis_nama' => 'Bangunan KTR. Permanen',
            ],
            [
                'jenis_id' => 1390202,
                'jenis_nama' => 'Bangunan Gudang',
            ],
            [
                'jenis_id' => 1390203,
                'jenis_nama' => 'Bangunan GD. Pertokoan',
            ],
            [
                'jenis_id' => 1390205,
                'jenis_nama' => 'Bangunan Rumah Dinas',
            ],
            [
                'jenis_id' => 1390207,
                'jenis_nama' => 'Bangunan Lainnya',
            ],
            [
                'jenis_id' => 1390405,
                'jenis_nama' => 'Perabot Kantor dari kayu',
            ],
            [
                'jenis_id' => 1390402,
                'jenis_nama' => 'Mesin Kantor',
            ],
            [
                'jenis_id' => 1390408,
                'jenis_nama' => 'Perlengkapan Lainnya',
            ],
            [
                'jenis_id' => 1390406,
                'jenis_nama' => 'Alat Kesenian / Olahraga',
            ],
            [
                'jenis_id' => 1390401,
                'jenis_nama' => 'Komputer',
            ],
            [
                'jenis_id' => 1390403,
                'jenis_nama' => 'Peralatan Komunikasi',
            ],
            [
                'jenis_id' => 1390504,
                'jenis_nama' => 'Perabot Kantor Logam',
            ],
            [
                'jenis_id' => 1390501,
                'jenis_nama' => 'Mesin - Mesin',
            ],
            [
                'jenis_id' => 1390502,
                'jenis_nama' => 'Kendaraan roda 4',
            ],
            [
                'jenis_id' => 1340101,
                'jenis_nama' => 'Aktiva Tak Terwujud',
            ]
          ];

          JenisAset::insert($jenis);
    }
}
