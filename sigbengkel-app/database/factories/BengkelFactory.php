<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BengkelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_bengkel' => $this->faker->name(),
            'deskripsi' => $this->faker->paragraphs(2, true),
            'alamat' => $this->faker->address(),
            'jenis_bengkel' => random_int(1,2),
            'foto' => 'foto-bengkel/default.png',
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
