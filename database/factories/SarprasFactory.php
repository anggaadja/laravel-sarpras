<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sarpras>
 */
class SarprasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => 'SAR-' . $this->faker->unique()->numberBetween(1000, 9999),
            'nama' => $this->faker->word(),
            'kategori' => $this->faker->randomElement(['Elektronik', 'Furniture', 'Kendaraan']),
            'lokasi' => $this->faker->randomElement(['Gudang A', 'Gudang B', 'Kantor']),
            'jumlah' => $this->faker->numberBetween(1, 100),
            'kondisi' => $this->faker->randomElement(['Baik', 'Perbaikan', 'Rusak']),
            'tanggal' => $this->faker->date(),
            'tanggal_perbaikan' => $this->faker->optional()->date(),
            'hasil_rekondisi' => $this->faker->optional()->sentence(),
        ];
    }
}
