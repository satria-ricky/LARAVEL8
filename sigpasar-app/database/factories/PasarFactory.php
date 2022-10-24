<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PasarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_pasar' => $this->faker->name(),
            'deskripsi' => $this->faker->paragraphs(2, true),
            'alamat' => $this->faker->address(),
            'tahun_didirikan' => $this->faker->year(),
            'perbaikan_terakhir' => $this->faker->year(),
            'status_kepemilikan' => $this->faker->word(),
            'luas_tanah' => $this->faker->randomFloat(),
            'luas_bangunan' => $this->faker->randomFloat(),
            'kondisi' => $this->faker->word(),
            'komoditi' => $this->faker->word(),
            'jumlah_pedagang_los' => $this->faker->randomDigit(),
            'jumlah_pedagang_kios' => $this->faker->randomDigit(),
            'aktivitas' => $this->faker->word(),
            'type_pasar' => $this->faker->word(),
            'foto' => 'foto-pasar/default.png',
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
