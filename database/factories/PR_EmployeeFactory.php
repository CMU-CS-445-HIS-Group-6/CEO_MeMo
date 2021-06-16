<?php

namespace Database\Factories;

use App\Models\PR_Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class PR_EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PR_Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'LastName' => $this->faker->lastName,
            'FirstName' => $this->faker->firstName,
            'VacationDays' => $this->faker->numberBetween(0, 5),
        ];
    }
}
