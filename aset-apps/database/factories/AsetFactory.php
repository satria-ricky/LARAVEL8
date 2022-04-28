<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AsetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'aset_no_rekening' => $this->faker->creditCardNumber(),
            'aset_deskripsi' => $this->faker->text($maxNbChars = 100),
            'aset_qty' => $this->faker->randomDigit(1),
            'aset_tgl_perolehan' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'aset_tgl_akhir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'aset_saldo_perolehan' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'aset_akm_susut' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'aset_nilai_buku' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'aset_prs_susut' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'aset_gssl_induk' => $this->faker->randomDigit(5),
            'aset_uraian' => $this->faker->text($maxNbChars = 100),
            'aset_sumber_perolehan' => $this->faker->randomDigit(1),
            'aset_foto' => 'foto/asetDefault.png'
        ];
        
    }
}
