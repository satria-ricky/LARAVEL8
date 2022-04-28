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
            'user_level' => random_int(1,2), 
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('12345'),
            'user_foto' => 'foto/user/userDefault.jpg'
        ];
    }


}
