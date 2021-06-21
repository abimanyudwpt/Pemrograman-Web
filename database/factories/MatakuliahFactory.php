<?php

namespace Database\Factories;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matakuliah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mk_id' => $this->faker->mk_id,
            'kode' => $this->faker->kode,
            'matakuliah' => $this->faker->matakuliah,
            'sks' => $this->faker->sks,
        ];
    }
}