<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_nama' => $this->faker->name(), 
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('12345')
        ];
    }


}
