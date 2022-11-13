<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_studio' => $this->faker->name(),
            'deskripsi' => $this->faker->paragraphs(2, true),
            'alamat' => $this->faker->address(),
            'foto' => 'foto-studio/default.png',
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
