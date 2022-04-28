<?php

namespace Database\Seeders;

use App\Models\Aset;
use App\Models\User;
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
        User::factory(5)->create();
        Aset::factory(5)->create();
    }
}
