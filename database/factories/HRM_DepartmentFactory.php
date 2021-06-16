<?php

namespace Database\Factories;

use App\Models\HRM_Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class HRM_DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HRM_Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->name,
            'Address' => $this->faker->address,
        ];
    }
}
