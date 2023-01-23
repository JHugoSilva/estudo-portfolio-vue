<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'institution' => 'UFRN-Universidade do Rio Grande do Norte',
            'period' => '2016-2018',
            'degree' => 'Tecnologia de Desenvolvimento de Sistemas',
            'department' => 'T.I'
        ];
    }
}
