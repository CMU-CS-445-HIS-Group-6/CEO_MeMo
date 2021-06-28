<?php

namespace Database\Factories;

use App\Models\HRM_Employment;
use Illuminate\Database\Eloquent\Factories\Factory;

class HRM_EmploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HRM_Employment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Hire_Date' => $this->faker->dateTimeThisDecade,
        ];
    }
}
